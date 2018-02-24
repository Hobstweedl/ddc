<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class Enrollment extends Model
{
  public function enrollable()
  {
    return $this->morphTo();
  }

  public function student() {
    return $this->belongsTo(Student::class, 'student_id');
  }

  public function friendlyDate($date)
  {
    if (isset($date)) {
      return (Carbon::parse($date)->format('D\, M\. jS Y'));
    } else {
      return null;
    }
      
  }
  
}
