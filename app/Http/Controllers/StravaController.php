<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use Validator;

class StravaController extends Controller
{
	function index(){
		$user = DB::table('users')->where('id', '=', Auth::user()->id)->first();
		$data = array(
			'hasToken' => NULL,
			'tracks' => DB::table('tracks')->leftJoin('users', 'users.id', '=', 'tracks.id')->where('tracks.id', '=', Auth::user()->id)->get()
		);
		if($user->strava_refresh_token == NULL){
			$data['hasToken'] = FALSE;
		}
		else{
			$data['hasToken'] = TRUE;
		}
		return view('strava', ['data' => $data]);
	}

	function exchangeToken(Request $request){
		$code = $request->get('code');
		DB::table('users')->where('id', Auth::user()->id)->update(['strava_authorization_code' => $code]);
		$data = array(
			'client_id' => '43078',
			'client_secret' => '021b1d8703425b8069b688de1e71863aab004f7d',
			'code' => $code,
			'grant_type' => 'authorization_code'
		);
		$postString = http_build_query($data, '', '&');
		$opts = array('http' =>
		array(
			'method'  => 'POST',
			'header'  => 'Content-type: application/x-www-form-urlencoded',
			'content' => $postString
		)
		);
		$context = stream_context_create($opts);
		
		$result = file_get_contents('https://www.strava.com/oauth/token', false, $context);
		if($result){
			$obj = json_decode($result);
			DB::table('users')->where('id', Auth::user()->id)->update(['strava_expires' => $obj->expires_at,'strava_access_token' => $obj->access_token,'strava_refresh_token' => $obj->refresh_token]);
		}
		return view('strava');
	}

	function loadTracks(){

	}
}
