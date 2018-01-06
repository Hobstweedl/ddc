<?php

namespace App\Http\Controllers;

use App\Family;
use App\HowDidYouHear;
use App\Student;
use App\PhoneType;
use Carbon\Carbon;
use Illuminate\Http\Request;


class FamiliesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $families = Family::getActive();
        $inactiveFamilies = Family::getInactive();
        $inactiveStudents = Student::getInactive();
        $howDidYouHearTypes = HowDidYouHear::get();
        $phoneTypes = PhoneType::get();
        return view('families.index', compact('families', 'inactiveFamilies', 'howDidYouHearTypes', 'phoneTypes', 'inactiveStudents'));
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
        $validated = $request->validate([
            'First' => 'required',
            'Last' => 'required',
            'Address1' => 'required',
            'City' => 'required',
            'State' => 'required',
            'Zip' => 'required',
            'ChargeForHolidays' => 'required',
            'ChargeRegistrationFee' => 'required'
        ]);
        $validated['StartDate'] = Carbon::parse($validated['StartDate']);
        $validated['EndDate'] = Carbon::parse($validated['EndDate']);

        $family = Family::create($validated);

        $request->session()->flash('alert-success', 'Inserted successfully!');

        $families = Family::getActive();
        $inactiveFamilies = Family::getInactive();
        $howDidYouHearTypes = HowDidYouHear::get();
        $phoneTypes = PhoneType::get();
        return view('families.index', compact('families', 'inactiveFamilies', 'howDidYouHearTypes', 'phoneTypes'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Family  $family
     * @return \Illuminate\Http\Response
     */
    public function show(Family $family)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Family  $family
     * @return \Illuminate\Http\Response
     */
    public function edit(Family $family)
    {
        $families = Family::getActive();
        $inactiveFamilies = Family::getInactive();
        $inactiveStudents = Student::where('family_id', $family->id)->where('Active', 0)->get();
        $howDidYouHearTypes = HowDidYouHear::get();
        $phoneTypes = PhoneType::get();
        return view('families.index', compact('family', 'families', 'inactiveFamilies', 'inactiveStudents', 'howDidYouHearTypes', 'phoneTypes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Family  $family
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Family $family)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Family  $family
     * @return \Illuminate\Http\Response
     */
    public function destroy(Family $family)
    {
        //
    }

    public function __construct()
    {

    }
}
