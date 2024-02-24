<?php

namespace App\Http\Services;

use App\Models\User;

class AuthService
{



    public static function login(string $email, string $password): User|bool{
        if(auth()->attempt(['email' => $email, 'password' => $password])){
            return auth()->user();
        }else{

            return false;
        }
    }




    public static function logout(){
        auth()->logout();

    }
}
