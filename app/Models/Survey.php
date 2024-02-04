<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Survey extends Model
{
    protected $table = 'surveys';

    public function cities(){
        return $this->hasMany('App\Models\City', 'city_id','id');
    }
    public function subcities(){
        return $this->belongsToMany('App\Models\Subcity', 'subcity_id','id');
    }
    public function questions(){
        return $this->belongsToMany('App\Models\Question', 'question_id','id');
    }
    public function sector(){
        return $this->belongsToMany('App\Models\Sector', 'sector_id','id');
    }
    public function wereda(){
        return $this->belongsToMany('App\Models\Wereda', 'wereda_id','id');
    }

}
