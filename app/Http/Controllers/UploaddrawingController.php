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

		$date = date('Y.m.d-H:i:s');
		$filename = Auth::user()->id . '_' . $request->get('name') .'_' .  date('Y.m.d-H:i:s') . '.png';
		$request->file('rajz')->storeAs(Auth::user()->id.'_'.Auth::user()->name, $filename);
		DB::table('drawings')->insert([
						'id' => Auth::user()->id,
						'drawingname' => $request->post('name'),
						'drawing_file_name' => $filename,
						'drawing_created_at' => DB::raw('now()')
					]);
		return view('drawfigure');
	}
    function saveToServer(Request $request){
		$date = date('Y.m.d-H:i:s');
		$upload_dir = "resources/";
		$bodyContent = $request->canvasimg;
		$ownname=$request->name;
		$data=$bodyContent;
		$img = base64_decode(explode(',', $data)[1]);
		$filename = $upload_dir . time() . $ownname . '.png';
		file_put_contents($filename, $img);
		/*DB::table('drawings')->insert([
						'id' => Auth::user()->id,
						'drawingname' => $request->post('name'),
						'drawing_file_name' => $filename,
						'drawing_created_at' => DB::raw('now()')
					]);*/
		return view('drawfigure');
	}
}
