<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Season extends Model
{
	protected $guarded = [];
	
    public function classes()
    {
    	return $this->hasMany(Classes::class);
    }

    public function sessions()
    {
    	return $this->belongsToMany(Session::class);
    }
}
