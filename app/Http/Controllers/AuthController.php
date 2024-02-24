<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Services\AuthService;
use Illuminate\Http\Request;

class AuthController extends Controller
{



    public function loginPage(){
        return view('auth.login');

    }





    public function login(Request $request){



        if($user = AuthService::login($request->email, $request->password)){
            return redirect()->route('home');

        }else{

            return redirect()->back()->with('error', 'Invalid username or password');
        }
    }


    public function logout(){
        auth()->logout();
        return redirect()->route('login');

    }
}
