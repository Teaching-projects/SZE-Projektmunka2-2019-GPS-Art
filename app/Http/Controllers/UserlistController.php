<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Hash;
use Validator;

class UserlistController extends Controller
{
    function list(){
    	$users = DB::table('users')->get();
    	return view('userlist', ['users' => $users]);
    }

    function delete(Request $request){
        if($request->post('whattodo')=='permdel'){
    	   DB::table('users')->where('id', $request->post('id'))->delete();
        }
        else if($request->post('whattodo')=='inact'){
            DB::table('users')->where('id', $request->post('id'))->update(['inactive' => true]);
        }
        return redirect('/userlist');
    }

    function verify(Request $request){
        return view('deluser', ['user' => $request->get('user')]);
    }


    function show(Request $request){
    	return view('usermod', ['user' => $request->get('user')]);
    }

    function modify(Request $request){



    	$user = DB::table('users')->where('id', $request->get('id'))->first();
    	if($user->name != $request->post('name')){
    		DB::table('users')->where('id', $request->post('id'))->update(['name' => $request->post('name')]);
    	}
    	if($user->email != $request->post('email')){
    		DB::table('users')->where('id', $request->post('id'))->update(['email' => $request->post('email')]);
    	}
    	if($request->get('password') != ''){
            $validator = Validator::make($request->all(), [
                'email'   => 'required|email',
                'password'  => 'required|alphaNum|min:8'
            ]);

            if ($validator->fails()) {
                return back()->with('error', 'Helytelen adatok!');
            }

    		DB::table('users')->where('id', $request->post('id'))->update(['password' => Hash::make($request->post('password'))]);
    	}
        if($request->get('my')===null){
        if($user->inactive && $request->post('inactive') === null){
            DB::table('users')->where('id', $request->post('id'))->update(['inactive' => false]);
        }
        else if(!$user->inactive && $request->post('inactive') !== null){
            DB::table('users')->where('id', $request->post('id'))->update(['inactive' => true]);
        }
        if($user->superuser && $request->post('superuser') === null){
            DB::table('users')->where('id', $request->post('id'))->update(['superuser' => false]);
        }
        else if(!$user->superuser && $request->post('superuser') !== null){
            DB::table('users')->where('id', $request->post('id'))->update(['superuser' => true]);
        }
        }        
    	return redirect('/userlist');
    }
}
