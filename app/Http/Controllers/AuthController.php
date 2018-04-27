<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;

class AuthController extends Controller
{
    public function register(){
    	return view('auth.register');
    }

    public function postRegister(Request $request){
    	return 'masuk';
    }

    public function login(){
    	return view('auth.login');
    }

    public function postLogin(Request $request){
    	if(Auth::attempt([ 'username' => $request->inputUsername, 'password' => $request->inputPassword,])){
    		$roles = User::where('username',$request->inputUsername)->first();
    		if($roles->status == 'admin'){
    			return redirect()->route('admin.dashboard');
    		}
    		elseif ($roles->status == 'manager') 
    		{
    			return redirect()->route('manager.dashboard');
    		}
    		else
    		{
    			return redirect()->route('executive.dashboard');
    		}
    	}
    	else
    	{
    		return redirect()->back();
    	}
    }

    public function logout(){
    	Auth::logout();

    	return redirect()->route('login');
    }
}
