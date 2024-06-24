<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function admin(Request $request){

        if($request->isMethod("post")){
            $request->validate([
                
                "email"=> "required|email",
                "password"=> "required"

            ]);

            if(Auth::attempt([
                "email" => $request->email,
                "password" => $request->password
            ])){
                return to_route('dashboard');
            }else{
                return to_route('admin')->with('error','Invalid login details');
            }

        }

        return view("auth.login");
    }

    public function register(Request $request){
        if($request->isMethod("post")){
            $request->validate([
                "name"=> "required|string",
                "email"=> "required|email|unique:users",
                "phone"=> "required",
                "password"=> "required"

            ]);

            User::create([
                "name" => $request->name,
                "email" => $request->email,
                "password" => bcrypt($request->password),
                "phone" => $request->phone
            ]);

            if(Auth::attempt([
                "email" => $request->email,
                "password" => $request->password
            ])){
                return to_route('dashboard');
            }else{
                return to_route('register');
            }
        }
        return view("auth.register");
    }

    public function dashboard(){
        return view("dashboard");
    }


    public function logout(){
        Session::flush();

        Auth::logout();

        return to_route('admin')->with('success','Logged out successfully');
    }
}
