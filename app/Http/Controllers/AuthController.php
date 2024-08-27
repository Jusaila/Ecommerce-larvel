<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register(){
        return view('auth.register');
    }
    public function do_register(Request $request){

        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => ['required','min:8','regex:/[a-z]/','regex:/[A-Z]/','regex:/[0-9]/','regex:/[@#$*+]/','confirmed'],

        ]);
        $input = $request->all();
        $data = User::CreateUser($input);
        if($data == true){
            return redirect(route('login'))->with('success','User Created Successfully');
        }else{
            return redirect(route('register'))->with('error','Something Went Wrong');

        }
    }

    public function login(){
        return view('auth.login');
    }
    public function do_login(Request $request){
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);
        $credentials = $request->only('email','password');
        if(Auth::attempt($credentials)){
            return redirect(route('home'));
        }
        return redirect(route('login'))->with('error','login failed');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        // $request->session()->invalidate();

        return redirect('/login')->with('success', 'You have been logged out.');
    }
}
