<?php

namespace App\Http\Controllers;

use App\Student;
use App\Family;
use Carbon\Carbon;
use Illuminate\Http\Request;

class StudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::all();
        $families = Family::all();
        return view('students.index', compact('students', 'families'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Family $family)
    {
        $families = Family::all();
        $family_id = $family->id;
        $family_last = $family->Last;
        return view('students.create', compact('family_id', 'family_last', 'families'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'First' => 'required',
            'Last' => 'required',
            'Sex' => 'required',
            'family_id' => 'required',
            'Birthday' => 'required',
            'MedicalConditions' => 'required',
            'PaperWaiver' => 'required',
            'OnlineWaiverAccepted' => 'required',
            'Performing' => 'required',
            'ThirdPartyID' => 'required'
        ]);
        $validated['Birthday'] = Carbon::parse($validated['Birthday']);
        $validated['OnlineWaiverAccepted'] = Carbon::parse($validated['OnlineWaiverAccepted']);
        $student = Student::create($validated);

        $request->session()->flash('alert-success', 'Inserted new student successfully!');

        $students = Student::all();
        $families = Family::all();
        return view('students.index', compact('students', 'families'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        $students = Student::all();
        $families = Family::all();
        return view('students.index', compact('student', 'families', 'students' ));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        //
    }
}
