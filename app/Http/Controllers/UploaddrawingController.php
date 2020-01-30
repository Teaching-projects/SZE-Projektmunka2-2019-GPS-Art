<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use Validator;

class UploaddrawingController extends Controller
{
	function index(){
		return view('drawfigure');
	}

	function upload(Request $request){
		if($request->file('rajz')->getClientOriginalExtension() != "png") return back()->with('error', 'Helytelen formátum!');
		$ownname=$request->post('name');
		$date = date('Y.m.d-H:i:s');
		$filename = Auth::user()->id . '_' . $request->get('name') .'_' .  date('Y.m.d-H:i:s') . '.png';
		$request->file('rajz')->storeAs(Auth::user()->id.'_'.Auth::user()->name, $filename);
		self::addToDB($filename, $ownname);
		return view('drawfigure');
	}


	function saveToServer(Request $request){
		self::saveFile($request);
		return view('drawfigure');
	}

	function saveFile(Request $request){
		$date = date('Y.m.d-H:i:s');
		$upload_dir = "resources/";
		$bodyContent = $request->canvasimg;
		$ownname=$request->name;
		$data=$bodyContent;
		$img = base64_decode(explode(',', $data)[1]);
		$nfname=base_path().'\storage\app\\' .Auth::user()->id . '_' . Auth::user()->name .'\\' .$ownname .'.png';
		$filename = Auth::user()->id. $ownname . '.png';
		file_put_contents($filename, $img);
		var_dump($nfname);
		$fname=base_path() .'\\'. $filename;
		$output = shell_exec('python ' . base_path() . '\\python\shaperec.py ' .$fname);
		$kor=base_path() .'/python'. '/kor.png';
		$rkor=base_path() .'/python'.'/real.png';
		var_dump($kor);
		var_dump($rkor);
		var_dump($output);
		$output2 = shell_exec('python ' . base_path() . '\\python\difference.py ' .$kor .' ' .$rkor );
		$output23 = 'python ' . base_path() . '/python/difference.py ' ;
		var_dump($output2);
		self::addToDB($nfname, $ownname, $output);
		return $nfname;
	}


	function addToDB($filename, $ownname,$output){
		DB::table('drawings')->insert([
			'id' => Auth::user()->id,
			'drawingname' => $ownname,
			'drawing_file_name' => $filename,
			'drawing_created_at' => DB::raw('now()'),
			'shape' =>$output
		]);
	}
}
