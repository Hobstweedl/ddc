<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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
}
