<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Classes extends Model
{
	public function season()
	{
		return $this->belongsTo(Season::class);
	}
}
