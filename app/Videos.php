<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Videos extends Model
{
    protected $fillable = [
    	'featured',
    ];

    public function getFeaturedAttribute($featured)
    {
    	return asset($featured);
    }
}
