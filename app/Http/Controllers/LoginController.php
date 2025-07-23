<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLogin(){
        if(Auth::check()){
            return redirect('/login')->with('error', 'Login first');
        }else{
            return view('login');
        }
    }

    public function actionLogin(Request $request){
        $data = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if(Auth::attempt($data)){
            return redirect('/')->with('success', 'Successfully login');
        }else{
            return redirect('/login')->with('error', 'Email or Password incorect');
        }
    }

    public function actionLogout(){
        Auth::logout();
        return redirect('/login')->with('success', 'Successfully logout');
    }
}
