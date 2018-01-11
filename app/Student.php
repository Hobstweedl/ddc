<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $guarded = [];

    public function family(){
        return $this->belongsTo(Family::class);
    }

    public function notes(){
        return $this->morphMany('App\Note', 'notable');
    }

    public function enrollments(){
      return $this->hasMany(Enrollment::class);
    }

    public function gender(){
        if ($this->Sex == 1) {
            return 'F';

        }elseif ($this->Sex == 2) {
            return 'M';
        }
    }

    public static function getActive()
    {
        return Student::where('Active', 1)->orderBy('Last', 'asc')->orderBy('First', 'asc')->get();
    }

    public static function getInactive()
    {
        return Student::where('Active', 0)->orderBy('Last', 'asc')->orderBy('First', 'asc')->get();
    }
}
