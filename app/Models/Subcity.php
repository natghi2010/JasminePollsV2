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
        return $this->hasMany('App\Wereda', 'subcity_id','id');
    }

    public function city(){
        return $this->belongsTo('App\City', 'city_id','id');
    }

}
