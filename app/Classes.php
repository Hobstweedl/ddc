<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use \Carbon\Carbon;

class Classes extends Model
{
    protected $guarded = [];
    
	public function season()
	{
		return $this->belongsTo(Season::class);
	}

	public function instructor()
    {
        return $this->belongsTo(Instructor::class);
    }

    public function enrollments()
    {
      return $this->hasMany(Enrollment::class);
    }

    public function location()
    {
        return $this->belongsTo(Location::class);
    }

    public function friendlyTime(Classes $class)
    {
        return (Carbon::parse($class->StartTime)->format('g:ia'));
    }

    public function endTime(Classes $class)
    {
        return (Carbon::parse($class->StartTime)->addMinutes($class->Length)->format('g:ia'));
    }

    public function dates()
    {
        return $this->hasMany(ClassDate::class)->orderBy('HeldOn');
    }

    public function days()
    {
        return $this->hasMany(ClassDay::class)->orderBy('DayHeldOn');
    }
}
