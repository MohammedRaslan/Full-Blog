<?php

namespace App;

use App\Pricing;

use Illuminate\Database\Eloquent\Model;

class PricingFeature extends Model
{
    protected $fillable = [
        'name',
        'package_id',
    ];

    public function package()
    {
        return $this->belongsTo('App\Pricing');
    }
}
