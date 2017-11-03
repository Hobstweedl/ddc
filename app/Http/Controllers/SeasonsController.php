<?php

namespace App\Http\Controllers;

use App\Season;
use Illuminate\Http\Request;
use Carbon\Carbon;

class SeasonsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $seasons = Season::all();
        return view('admin.seasons.index', compact('seasons'));
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

        $season = $request->validate([
            'Name' => 'required',
            'StartDate' => 'required',
            'EndDate' => 'required',
            'SeasonType' => 'required',
            'Viewable' => 'required',
            'ProrateOnEnrollment' => 'required',
            'ChargeForHolidays' => 'required',
            'ChargeRegistrationFee' => 'required'
        ]);

        $season['StartDate'] = Carbon::parse($season['StartDate']);
        $season['EndDate'] = Carbon::parse($season['EndDate']);

        Season::create($season);
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Season  $season
     * @return \Illuminate\Http\Response
     */
    public function destroy(Season $season)
    {
        //
    }
}
