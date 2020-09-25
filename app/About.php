<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    protected $fillable = [
        'mission',
        'history',
        'vision',
        'logo',
    ];
}
