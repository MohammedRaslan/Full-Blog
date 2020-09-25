<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HomePage extends Model
{
    protected $fillable = [
        'slider',
        'history',
        'features',
        'services',
        'counter',
        'projects',
        'faq',
        'team',
        'pricing',
        'testimonials',
        'partners',
        'news',
    ];
}
