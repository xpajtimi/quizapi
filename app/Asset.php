<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Asset extends Model
{
    protected $fillable = [
    	'name',
    ];

    public function getNameAttribute($name)
    {
    	return asset($name);
    }
}
