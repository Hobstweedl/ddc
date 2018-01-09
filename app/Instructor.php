<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Instructor extends Model
{
    public function addresses()
    {
        return $this->morphMany('instructor', 'addressable');
    }

    public function classes() {
        return $this->hasMany(Classes::class);
    }

    public function notes(){
        return $this->morphMany('App\Note', 'notable');
    }

}

