<?php
namespace App\Enums;

class UserLevelEnums
{

    const ADMIN = 1;
    const USER = 2;



    public static function getAll(){
        return [
            self::ADMIN,
            self::USER

        ];
    }
}
