<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use File;
use Hash;
use Validator;
use Auth;

class TracklistController extends Controller
{
	function showUsersTracks(Request $request) {
		if($request==null){
			$tracks = DB::table('tracks')->leftJoin('users', 'users.id', '=', 'tracks.id')->get();
		}
		else{
			$tracks = DB::table('tracks')->leftJoin('users', 'users.id', '=', 'tracks.id')->where('tracks.id', '=', $request->get('user')['id'])->get();
		}
		return view('tracklist', ['tracks' => $tracks]);
	}

    function deleteTrack(Request $request){
        $filetoDelete = $request->get('track');
        unlink(storage_path('app/'.$filetoDelete['id'].'_'.$filetoDelete['name'].'/'.$filetoDelete['track_file_name']));
        DB::table('tracks')->where('trackid', '=', $filetoDelete['trackid'])->delete();
        return redirect()->route('tracklist', ['user' => ['id' => Auth::user()->id]]);
    }

    function viewTrack(Request $request){
        $filetoView = $request->get('track');
        $content = File::get(storage_path('app/'.$filetoView['id'].'_'.$filetoView['name'].'/'.$filetoView['track_file_name']));
        return view('viewtrack', ['track' => $content, 'trackname' => $filetoView['trackname']]);
    }

    function showRenameTrack(Request $request){
        return view('renametrack', [ 'track' => $request->get('track')]);
    }

    function renameTrack(Request $request){
        $trackid = $request->post('id');
        $trackname = $request->post('name');
        DB::table('tracks')->where('trackid', '=', $trackid)->update(['trackname' => $trackname]);
        return redirect()->route('tracklist', ['user' => ['id' => Auth::user()->id]]);
    }

}
