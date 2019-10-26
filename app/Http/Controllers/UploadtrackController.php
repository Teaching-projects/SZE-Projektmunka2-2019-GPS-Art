<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use Validator;

class UploadtrackController extends Controller
{
	function index(){
		return view('upload');
	}

	function upload(Request $request){
		if($request->file('track')->getClientOriginalExtension() != "gpx") return back()->with('error', 'Helytelen formátum!');

		$date = date('Y.m.d-H:i:s');
		$filename = Auth::user()->id . '_' . $request->get('name') .'_' .  date('Y.m.d-H:i:s') . '.gpx';
		$request->file('track')->storeAs(Auth::user()->id.'_'.Auth::user()->name, $filename);
		DB::table('tracks')->insert([
						'id' => Auth::user()->id,
						'trackname' => $request->post('name'),
						'track_file_name' => $filename,
						'track_created_at' => DB::raw('now()')
					]);
		return view('successlogin');
	}
}
