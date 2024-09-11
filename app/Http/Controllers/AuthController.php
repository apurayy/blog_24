<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(){
        return view('Auth.login');
    }

    public function register(){
        return view('Auth.register');
    }

    public function register_user(Request $request){
        $save = new User();
        $save->name = $request->name;
        $save->email = $request->email;
        $save->password = Hash::make($request->password);
        $save->save();

        return redirect('login')->with('success', "Register Successfull!");

    }

    public function login_save(Request $request){
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password]))
        {
            return redirect('dashboard');
        }else{
            return redirect()->back()->with('error', "Please Enter The Currect Email & Password");
        }
    }



    //logout============

    public function logout(){
        Auth::logout();
        return redirect('login');
    }


}
