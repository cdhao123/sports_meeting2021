<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    //
    protected $fillable = ['game_id', 'path', 'description', 'shot_time'];
    protected $dates = [
        'shot_time'
    ];
}
