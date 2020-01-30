<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use File;
use Hash;
use Validator;
use Auth;

class ShowDifference extends Controller
{
    function show(Request $request) {
		
		if($request==null){
			$drawings = DB::table('drawings')->leftJoin('users', 'users.id', '=', 'drawings.id')->get();
		}
		else{
			$drawings = DB::table('drawings')->leftJoin('users', 'users.id', '=', 'drawings.id')->get();
			$tomb=array();
			$i = 0;
			foreach ($drawings as $value){
				$tomb[$i]=$value->similarity;
				$i++;
			}
			$j=0;
			$minim=min($tomb);
			$bestName="";
			$bestOwner="";
			foreach ($drawings as $value){
				if(($value->similarity)==$minim){				
				$bestName=$value->drawingname;
				$bestOwner=$value->name;
				}
				$j++;
			}

		}
		return view('showdifference', ['drawings' => $drawings, 'best'=>$bestName, 'bestOwner'=>$bestOwner]);
	}

}