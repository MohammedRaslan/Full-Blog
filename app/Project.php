<?php

namespace App;

use App\ProjectCat;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'name',
        'category_id',
        'short_description',
        'long_description',
        'client_name',
        'start_date',
        'end_date',
        'client_feedback',
        'image',
    ];

    public function package()
    {
        return $this->belongsTo('App\ProjectCat');
    }
}
