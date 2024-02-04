<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Sector extends Model
{
    protected $table = 'sectors';

    protected $hidden=[
        'created_at',
        'updated_at',
        'parent_id'
    ];

}
