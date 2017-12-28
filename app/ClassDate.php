<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use \Carbon\Carbon;

class ClassDate extends Model
{
    protected $table = 'class_dates';

    public function friendlyDate(ClassDate $classdate)
    {
        return (Carbon::parse($classdate->HeldOn)->format('D\.\, M\. jS Y'));
    }

    public function friendlyTime(ClassDate $classdate)
    {
        return (Carbon::parse($classdate->StartTime)->format('g:ia'));
    }

    public function endTime(ClassDate $classdate)
    {
        return (Carbon::parse($classdate->StartTime)->addMinutes($classdate->Length)->format('g:ia'));
    }

}
