<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use \Carbon\Carbon;

class Classes extends Model
{
	public function season()
	{
		return $this->belongsTo(Season::class);
	}

	public function instructor()
    {
        return $this->belongsTo(Instructor::class);
    }

    public function location()
    {
        return $this->belongsTo(Location::class);
    }

    public function friendlyTime(Classes $class)
    {
        return (Carbon::parse($class->StartTime)->format('g:i A'));
    }

    public function endTime(Classes $class)
    {
        return (Carbon::parse($class->StartTime)->addMinutes($class->Length)->format('g:i A'));
    }
}
