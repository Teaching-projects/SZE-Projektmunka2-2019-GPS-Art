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

		$date = date('Y.m.d-H_i_s');
		$filename_gpx = Auth::user()->id . '_' . $request->get('name') .'_' .  $date . '.gpx';
		$filename_png = Auth::user()->id . '_' . $request->get('name') .'_' .  $date . '.png';
		$request->file('track')->storeAs(Auth::user()->id.'_'.Auth::user()->name, $filename_gpx);
		$fullpath = storage_path('app/' . Auth::user()->id.'_'.Auth::user()->name . '/');
		shell_exec('python ' . base_path() . '/python/tracktopng.py "' . "{$fullpath}{$filename_gpx}" . '" "' . "{$fullpath}{$filename_png}" . '"');
		DB::table('tracks')->insert([
						'id' => Auth::user()->id,
						'trackname' => $request->post('name'),
						'track_file_name' => $filename_gpx,
						'track_created_at' => DB::raw('now()')
					]);
		return view('successlogin');
	}
}
