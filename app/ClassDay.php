<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use \Carbon\Carbon;

class ClassDay extends Model
{
    protected $table = 'class_days';

    public function classes()
    {
        return $this->belongsToMany(Classes::class, 'id');
    }

}
