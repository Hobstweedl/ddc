<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Enrollment extends Model
{
    public function class() {
        return $this->belongsTo(Classes::class, 'classes_id');
    }

    public function date() {
        return $this->belongsTo(ClassDate::class, 'class_dates_id');
    }

    public function friendlyDate($date)
    {
        return (Carbon::parse($date)->format('D\, M\. jS Y'));
    }
}
