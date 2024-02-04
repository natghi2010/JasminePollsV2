<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Result extends Model
{

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    public function cities(){
        return $this->hasMany('App\City','id');
    }
    public function subcities(){
        return $this->belongsTo('App\Subcity', 'subcity_id','id');
    }
    public function questions(){
        return $this->belongsTo('App\Question','id');
    }
    public function sector(){
        return $this->belongsTo('App\Sector','id');
    }
    public function wereda(){
        return $this->belongsTo('App\Wereda','id');
    }
}
