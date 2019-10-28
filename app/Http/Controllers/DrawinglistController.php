<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use File;
use Hash;
use Validator;
use Auth;

class DrawinglistController extends Controller
{
	function showUsersDrawings(Request $request) {
		if($request==null){
			$drawings = DB::table('drawings')->leftJoin('users', 'users.id', '=', 'drawings.id')->get();
		}
		else{
			$drawings = DB::table('drawings')->leftJoin('users', 'users.id', '=', 'drawings.id')->get();
		}
		return view('drawinglist', ['drawings' => $drawings]);
	}

    function deletedrawing(Request $request){
        $filetoDelete = $request->get('drawings');
        unlink(storage_path('app/'.$filetoDelete['id'].'_'.$filetoDelete['name'].'/'.$filetoDelete['drawing_file_name']));
        DB::table('drawings')->where('drawingid', '=', $filetoDelete['drawingid'])->delete();
        return redirect()->route('drawinglist', ['user' => ['id' => Auth::user()->id]]);
    }

    function viewdrawing(Request $request){
        $filetoView = $request->get('drawings');
        $content = '/app/'.$filetoView['id'].'_'.$filetoView['name'].'/'.$filetoView['drawing_file_name'];
        return view('viewdrawing', ['drawings' => $content, 'drawingname' => $filetoView['drawingname']]);
    }

    function showRenamedrawing(Request $request){
        return view('renamedrawing', [ 'drawings' => $request->get('drawings')]);
    }

    function renamedrawing(Request $request){
        $drawingsid = $request->post('id');
        $drawingsname = $request->post('name');
        DB::table('drawings')->where('drawingid', '=', $drawingid)->update(['drawingname' => $drawingname]);
        return redirect()->route('drawinglist', ['user' => ['id' => Auth::user()->id]]);
    }

}
