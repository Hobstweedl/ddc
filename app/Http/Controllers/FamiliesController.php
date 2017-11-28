<?php

namespace App\Http\Controllers;

use App\Family;
use App\HowDidYouHear;
use App\PhoneType;
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
        $howDidYouHearTypes = HowDidYouHear::get();
        $phoneTypes = PhoneType::get();
        return view('families.index', compact('families', 'inactiveFamilies', 'howDidYouHearTypes', 'phoneTypes'));
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

        $season = Season::create($validated);

        $request->session()->flash('alert-success', 'Inserted successfully!');

        $seasons = Season::all();
        return view('admin.seasons.index', compact('seasons'));
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
        $howDidYouHearTypes = HowDidYouHear::get();
        $phoneTypes = PhoneType::get();
        return view('families.index', compact('family', 'families', 'inactiveFamilies', 'howDidYouHearTypes', 'phoneTypes'));
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
}
