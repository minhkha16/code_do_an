<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login(){
        if(Auth::check()){
            return redirect()->route('home');
        }
        return view('login');
    }
    public function postlogin(Request $request){
        $credentials = $request->validate([
            'email' => ['required'],
            'password' => ['required'],
        ]);
        $credentials["level"] = 2;
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
 
            return redirect()->route('home');
        }
 
        return redirect()->route('login')->with('error','Members dont exist');
    }
    public function logout(){
        Auth::logout();
        return redirect()->route('login');
    }

    public function sinup(Request $request){
        $data= $request->except('_token','Repeat_Password');
        $data['password'] = bcrypt($request->password); 
        $data['level'] = 2;
        DB::table('user')->insert($data);
        return redirect()->route('home');
    }
}
