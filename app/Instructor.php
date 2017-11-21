<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Instructor extends Model
{
    public function addresses()
    {
        return $this->morphMany('family', 'addressable');
    }
}
