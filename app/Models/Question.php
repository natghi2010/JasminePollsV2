<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $casts = [
        "answer_set"=>'array'
    ];
    protected $hidden = [
        'created_at',
        'updated_at',
    ];
    protected $table = "questions";

     public function results(){
        return $this->hasMany('App\Models\Result', 'result_id','id');
    }
}
