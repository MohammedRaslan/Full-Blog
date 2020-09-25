<?php

namespace App;

use App\PricingFeature;

use Illuminate\Database\Eloquent\Model;

class Pricing extends Model
{
    protected $fillable = [
        'title',
        'icon',
        'price',
    ];

    public function features()
    {
        return $this->hasMany('App\PricingFeature');
    }
}
