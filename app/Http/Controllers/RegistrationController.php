<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Validator;
use Auth;
use App\User;
use Hash;

class RegistrationController extends Controller
{
    function index(){
    	return view('registration');
    }

    function store(Request $request){
        $validator = Validator::make($request->all(), [
            'email'   => 'required|email',
            'password'  => 'required|alphaNum|min:8'
        ]);

        if ($validator->fails()) {
            return back()->with('error', 'Helytelen adatok!');
        }

    	DB::table('users')->insert([
        	'name' => $request->get('name'),
        	'email' => $request->get('email'),
        	'password' => Hash::make($request->get('password')),
            'inactive' => $request->get('inactive')===null?false:true,
            'superuser' => false,
            'user_created_at' => DB::raw('now()'),
            'user_updated_at' => DB::raw('now()')
        ]);
        return redirect('/userlist');
    }
}
