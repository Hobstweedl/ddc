<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Family extends Model
{
    protected $guarded = [];

    public function addresses()
    {
        return $this->morphMany('App\Address', 'addressable');
    }

    public function phones(){
        return $this->morphMany('App\Phone', 'phoneable');
    }

    public function notes(){
        return $this->morphMany('App\Note', 'notable');
    }

    public function name() {
        return $this->First.' '.$this->Last;
    }

    public static function getActive()
    {
    	return Family::where('Active', 1)->orderBy('Last', 'asc')->orderBy('First', 'asc')->get();
    }

    public static function getInactive()
    {
    	return Family::where('Active', 0)->orderBy('Last', 'asc')->orderBy('First', 'asc')->get();
    }

    public function students()
    {
    	return $this->hasMany(Student::class);
    }
}
