<?php

namespace App\Http\Controllers;

use App\Season;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SeasonsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $seasons = Season::sorted()->get()->reject->isArchived();
        return view('admin.seasons.index', compact('seasons'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $season = new Season;
        return view('admin.seasons.create', compact('season'));
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
            'Name' => 'required',
            'StartDate' => 'required',
            'EndDate' => 'required',
            'SeasonType' => 'required',
            'Viewable' => 'required',
            'ProrateOnEnrollment' => 'required',
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
     * @param  \App\Season  $season
     * @return \Illuminate\Http\Response
     */
    public function show(Season $season)
    {
        return view('admin.seasons.show', compact('season'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Season  $season
     * @return \Illuminate\Http\Response
     */
    public function edit(Season $season)
    {
        return view('admin.seasons.edit', compact('season'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Season  $season
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Season $season)
    {
        $request->validate([
            'Name' => 'required',
            'StartDate' => 'required',
            'EndDate' => 'required',
            'SeasonType' => 'required',
            'Viewable' => 'required',
            'ProrateOnEnrollment' => 'required',
            'ChargeForHolidays' => 'required',
            'ChargeRegistrationFee' => 'required'
        ]);

        $season['Name'] = $request['Name'];
        $season['StartDate'] = Carbon::parse($season['StartDate']);
        $season['EndDate'] = Carbon::parse($season['EndDate']);
        $season['SeasonType'] = $request['SeasonType'];
        $season['Viewable'] = $request['Viewable'];
        $season['ProrateOnEnrollment'] = $request['ProrateOnEnrollment'];
        $season['ChargeForHolidays'] = $request['ChargeForHolidays'];
        $season['ChargeRegistrationFee'] = $request['ChargeRegistrationFee'];

        $season->save();
        $request->session()->flash('alert-success', 'Saved successfully!');

        return redirect('/seasons');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Season  $season
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Season $season)
    {
        $season->classes->each->archive();
        $season->archive();
        $season->save();
        $request->session()->flash('alert-success', 'Archived successfully!');
        return redirect('/seasons');
    }
}
