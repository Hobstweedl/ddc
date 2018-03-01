<?php

namespace App\Http\Controllers;

use App\Enrollment;
use App\Student;
use App\Family;
use Illuminate\Http\Request;
use DateTime;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class EnrollmentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Enrollment  $enrollment
     * @return \Illuminate\Http\Response
     */
    public function show(Enrollment $enrollment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Enrollment  $enrollment
     * @return \Illuminate\Http\Response
     */
    public function edit(Enrollment $enrollment)
    {
    $students = Student::getActive();
    $families = Family::getActive();
    $inactiveStudents = Student::getInactive();
    $daysEnrolledInClass = DB::table('class_days')
      ->join('enrollments', 'class_days.id', '=', 'enrollments.enrollable_id')
      ->where([
        ['enrollments.enrollable_type', '=', 'App\ClassDay'],
        ['enrollments.student_id', '=', $enrollment->student_id],
        ['class_days.classes_id', '=', $enrollment->enrollable->classes_id],
      ])->get();
    $datesEnrolledInClass = DB::table('class_dates')
      ->join('enrollments', 'class_dates.id', '=', 'enrollments.enrollable_id')
      ->where([
        ['enrollments.enrollable_type', '=', 'App\ClassDate'],
        ['enrollments.student_id', '=', $enrollment->student_id],
        ['class_dates.classes_id', '=', $enrollment->enrollable->classes_id],
      ])->get();
    return view('enrollments.edit', [
        'enrollment' => $enrollment,
        'students' => $students,
        'families' => $families,
        'inactiveStudents' => $inactiveStudents,
        'datesEnrolledInClass' => $datesEnrolledInClass,
        'daysEnrolledInClass' => $daysEnrolledInClass
      ]);        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Enrollment  $enrollment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Enrollment $enrollment)
    {
      $validated = $request->validate([
        'EnrolledOn' => 'required',
        'StartChargingOn' => 'required'
      ]);
      $enrollment['EnrolledOn'] = Carbon::parse($validated['EnrolledOn']);
      $enrollment['StartChargingOn'] = Carbon::parse($validated['StartChargingOn']);
      $enrollment->save();
      $request->session()->flash('alert-success', 'Enrollment saved successfully!');
      return redirect()->route('students.edit', $enrollment->student_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Enrollment  $enrollment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Enrollment $enrollment)
    {
        $enrollment['Dropped'] = 1;
        $enrollment['DroppedOn'] = Carbon::now();
        $enrollment->save();
        $request->session()->flash('alert-success', 'Dropped enrollment successfully!');
        return redirect()->route('students.edit', $enrollment->student_id);
    }
}
