<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;

class DatabaseController extends Controller
{
    function szabitkivesz(Request $request){
		$data = $request->post('data');
		$szabadsag = $data['szabadsag'];
		$id = Auth::user()->id;
		if(count($szabadsag) > 42) {
			return json_encode(false);
		}
		foreach($szabadsag as $s){
			if($s['isTravel'] == 'false'){
				if($s['optionValue'] == 0){
					DB::table('szabadsagok')->where([['id', '=', $id], ['sznap', '=', $s['date']]])->delete();
					DB::table('utazasok')->where([['id', '=', $id], ['datum', '=', $s['date']]])->delete();
					continue;
					//return json_encode("szabi torolve");
				}
				$kiirt = DB::table('szabadsagok')->where([['id', '=', $id], ['sznap', '=', $s['date']]])->get();
				if(count($kiirt) != 0){
					DB::table('szabadsagok')->where([['id', '=', $id], ['sznap', '=', $s['date']]])->update(['tipus' => $s['optionValue']]);
					continue;
					//return json_encode("szabi modositva");
				}
				else{
					DB::table('utazasok')->where([['id', '=', $id], ['datum', '=', $s['date']]])->delete();
					DB::table('szabadsagok')->insert([
						'id' => $id,
						'sznap' => $s['date'],
						'tipus' => $s['optionValue']
					]);
					continue;
					//return json_encode("szabi letarolva");
				}
			}
			else{
				if($s['optionValue'] == 0){
					DB::table('szabadsagok')->where([['id', '=', $id], ['sznap', '=', $s['date']]])->delete();
					DB::table('utazasok')->where([['id', '=', $id], ['datum', '=', $s['date']]])->delete();
					continue;
					//return json_encode('utazas torolve');
				}
				$kiirt = DB::table('utazasok')->where([['datum', '=', $s['date']], ['id', '=', $id]])->get();
				$kozossegi = $s['optionValue'] == 11 ? true : false;
				$odavissza = $s['optionValue'] == 10 ? true : false;
				
				if(count($kiirt) != 0){
					DB::table('utazasok')->where([['datum', '=', $s['date']], ['id', '=', $id]])->update(['kozossegi' => $kozossegi, 'odavissza' => $odavissza]);
					continue;
					//return json_encode("ut modositva");
				}
				else{
					DB::table('szabadsagok')->where([['id', '=', $id], ['sznap', '=', $s['date']]])->delete();
					DB::table('utazasok')->insert([
						'id' => $id,
						'datum' => $s['date'],
						'kozossegi' => $kozossegi,
						'odavissza' => $odavissza
					]);
					continue;
					//return json_encode("ut letarolva");
				}
				
			}
		}
		return json_encode(true);
	}
	
	function szabitleker(Request $request){
		$data = $request->post('data');
		$from = $data['dateFrom'];
		$to = $data['dateTo'];
		$id = Auth::user()->id;
		$returnData = array();
		$resultSzabi = DB::table('szabadsagok')->where([['sznap', '>=', $from], ['sznap', '<=', $to], ['id', '=', $id]])->orderBy('sznap')->get();
		$resultUtazas = DB::table('utazasok')->where([['datum', '>=', $from], ['datum', '<=', $to], ['id', '=', $id]])->orderBy('datum')->get();
		foreach($resultSzabi as $r){
			$o = (object)['date' => $r->sznap, 'approved' => $r->allapot, 'optionValue' => $r->tipus, 'isTravel' => false];
			array_push($returnData, $o);
		}
		foreach($resultUtazas as $r){
			$tipus = 11;
			if(!$r->kozossegi && $r->odavissza){
				$tipus = 10;
			}
			else if(!$r->kozossegi && !$r->odavissza){
				$tipus = 9;
			}
			$o = (object)['date' => $r->datum, 'optionValue' => $tipus, 'isTravel' => true];
			array_push($returnData, $o);
		}
		return json_encode($returnData);
	}

	function szabitbiral(Request $request){
		$id = $request->post('sz_id');
		$allapot = $request->post('allapot') !== null ? $request->post('allapot') : 0;

		DB::table('szabadsagok')->where([['sz_id', '=', $id]])->update(['allapot' => $allapot]);
		DB::table('szabadsagok')->where([['sz_id', '=', $id]])->update(['megjegyzes' => $request->post('megjegyzes')]);

		return redirect('/szabadsag/biral');
	}

	function szabikatmegjelenit(){
		$szab = DB::table('szabadsagok')->leftJoin('users', 'users.id', '=', 'szabadsagok.id')->where([['allapot', '=', 0]])->get();
		return view('szablist', ['szabadsagok' => $szab]);
	}

	function idoszaklezaro(){
		return view('lezaras');
	}

	function lezar(Request $request){
		$ev = $request->post('ev');
		$honap = $request->post('honap');
		$from= $ev.'-'.$honap.'-01';
		if ((int)$honap>9){
			$honap=(int)$honap+1;
			$to= $ev.'-'.$honap.'-01';	
		} else {
			$honap=(int)$honap+1;
			$to= $ev.'-0'.$honap.'-01';			
		}

		if (DB::table('szabadsagok')->where([['sznap', '>=', $from], ['sznap', '<', $to], ['allapot', '=', 0]])->count()>0){

			return back()->with('error', "Nem lehet lezárni az időszakot. Még vannak elbírálatlan szabadságok.");
		} else{
			DB::table('szabadsagok')->where([['sznap', '>=', $from], ['sznap', '<', $to], ['allapot', '=', 1]])->update(['allapot' => 10]);
			DB::table('szabadsagok')->where([['sznap', '>=', $from], ['sznap', '<', $to], ['allapot', '=', 2]])->delete();			
			return redirect('/lezaras');
		}
	}

	function felold(Request $request){
		$ev = $request->post('ev');
		$honap = $request->post('honap');
		$from= $ev.'-'.$honap.'-01';
		if ((int)$honap>9){
			$honap=(int)$honap+1;
			$to= $ev.'-'.$honap.'-01';	
		} else {
			$honap=(int)$honap+1;
			$to= $ev.'-0'.$honap.'-01';			
		}
		DB::table('szabadsagok')->where([['sznap', '>=', $from], ['sznap', '<', $to], ['allapot', '=', 10]])->update(['allapot' => 1]);
		return redirect('/lezaras');
	}

	function showcalendar(Request $request){
		return view('calendar');
	}
}
