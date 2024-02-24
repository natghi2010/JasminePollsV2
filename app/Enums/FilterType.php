<?php
namespace App\Enums;

class FilterType
{

    const CITY = 'cities';
    const SUBCITY = 'subcities';
    const WEREDA = 'weredas';
    const SECTOR = 'sectors';

    const QUESTION = 'questions';



    public static function getAll(){
        return [
            self::CITY,
            self::SUBCITY,
            self::WEREDA,
            self::SECTOR

        ];
    }
}
