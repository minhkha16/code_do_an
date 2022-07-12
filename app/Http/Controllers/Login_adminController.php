<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class Login_adminController extends Controller
{
    public function login_admin(){
        if(Auth::check()){
            return redirect()->route('admin.user.index');
        }
        return view('login_admin');
    }
    public function postlogin_admin(Request $request){
        $credentials = $request->validate([
            'email' => ['required'],
            'password' => ['required'],
        ]);
        $credentials["level"] = 1;
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
 
            return redirect()->route('admin.user.index');
        }
 
        return redirect()->route('login_admin')->with('error','Members dont exist');
    }
    public function logout_admin(){
        Auth::logout();
        return redirect()->route('login_admin');
    }
}
