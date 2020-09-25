<?php

namespace App;

use App\Project;

use Illuminate\Database\Eloquent\Model;

class ProjectCat extends Model
{
    protected $fillable = [
        'name',
    ];

    public function package()
    {
        return $this->hasMany('App\Project');
    }
}
