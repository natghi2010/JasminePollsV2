<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Wereda extends Model
{
    protected $hidden = [
        "created_at",
        "updated_at",
        "subcity_id"
    ];

    public function subcity(){
        return $this->belongsTo('App\Subcity', 'subcity_id','id');
    }

}
