<?php
namespace App\Enums;

class AreaTypeEnums
{

    const WEREDA = 1;
    const SUBCITY = 2;
    const CITY = 3;



    public static function getAll(){
        return [
            self::WEREDA,

            self::SUBCITY,
            self::CITY
        ];
    }

}
