<?php

namespace App\Http\Services;

use App\Models\User;

class AuthService
{



    public static function login(string $username, string $password): User|bool{
        if(auth()->attempt(['username' => $username, 'password' => $password])){
            return auth()->user();
        }else{

            return false;
        }
    }


    public static function logout(){
        auth()->logout();
    }
}
