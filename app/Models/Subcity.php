<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Subcity extends Model
{
    protected $table = 'subcities';

    protected $hidden  = [
        'created_at',
        'updated_at',
        'city_id'
    ];

    public function weredas(){
        return $this->hasMany(Wereda::class, 'subcity_id','id');
    }

    public function city(){
        return $this->belongsTo(City::class, 'city_id','id');
    }

}
