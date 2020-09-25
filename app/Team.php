<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $fillable = [
        'fname',
        'lname',
        'position',
        'image',
        'facebook',
        'twitter',
        'linkedin',
        'instagram',

    ];
}
