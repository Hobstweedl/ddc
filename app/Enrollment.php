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

  public function otherEnrollmentsInClass(Enrollment $enrollment)
  {
    if ($enrollment->enrollable->class->season->SeasonType == 1) {
      $otherEnrollments = DB::table('class_days')
        ->join('enrollments', 'class_days.id', '=', 'enrollments.enrollable_id')
        ->where([
          ['enrollments.enrollable_type', '=', 'App\ClassDay'],
          ['enrollments.student_id', '=', $enrollment->student_id],
          ['class_days.classes_id', '=', $enrollment->enrollable->classes_id],
        ])->get();
    } else {
      $otherEnrollments = DB::table('class_dates')
        ->join('enrollments', 'class_dates.id', '=', 'enrollments.enrollable_id')
        ->where([
          ['enrollments.enrollable_type', '=', 'App\ClassDate'],
          ['enrollments.student_id', '=', $enrollment->student_id],
          ['class_dates.classes_id', '=', $enrollment->enrollable->classes_id],
        ])->get();
    }    
    return ($otherEnrollments);
  }
}
