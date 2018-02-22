<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use \Carbon\Carbon;

class ClassDay extends Model
{
    protected $table = 'class_days';

    public function class()
    {
        return $this->belongsTo(Classes::class, 'classes_id');
    }

    public function enrollments()
    {
        return $this->morphMany('App\Enrollment', 'enrollable');
    }

}
