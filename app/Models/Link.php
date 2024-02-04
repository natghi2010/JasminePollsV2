<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    protected $hidden = [
        'id',
        'created_at',
        'updated_at',
        'sector_city_id',
        'sector_subcity_id',
        'sector_wereda_id'
    ];

    public function city(){
       return $this->belongsTo('App\Sector','sector_city_id') ?? null;
    }
    public function subcity(){
        return $this->belongsTo('App\Sector','sector_subcity_id') ?? null;
    }
    public function wereda(){
        return $this->belongsTo('App\Sector','sector_wereda_id') ?? null;
    }

}
