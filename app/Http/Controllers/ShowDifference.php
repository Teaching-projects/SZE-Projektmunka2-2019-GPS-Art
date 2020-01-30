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
			foreach ($drawings as $value){
				echo $value->shape ;
			}
			$output = shell_exec('python ' . base_path() . '/python/shaperec.py kor.png');
			var_dump($output);
			$ot="lofazud ";
			$classname = str_replace(' ', '', $output);
			$classname2=preg_replace('/\s+/u', '',$output);
			var_dump($classname2);

		}
		return view('showdifference', ['drawings' => $drawings]);
	}

}