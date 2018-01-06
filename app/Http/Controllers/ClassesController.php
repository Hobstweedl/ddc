<?php

namespace App\Http\Controllers;

use App\Classes;
use App\Season;
use Illuminate\Http\Request;

class ClassesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Season $season)
    {
        if (isset($season->id)) {
            $classes = $season->classes()->orderBy('StartTime', 'asc')->get();
        } else {
            $classes = Classes::all();
        }
        $seasons = Season::where('Archived', 0)->orderBy('Order', 'asc')->get();
        $daysOfWeek = ['Monday','Tuesday','Wednesday','Thursday','Friday','Saturday','Sunday'];

        /*  It's better to explicitly set the data being passed into the view
            If a variable that is undefined or null is passed to the compact function
            it will basically insert a null pointer into the compacted object and break
            everything compacted afterwards.
        */
        return view('classes.index', [
            'classes' => $classes,
            'seasons' => $seasons,
            'season' => $season,
            'daysOfWeek' => $daysOfWeek
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('classes.create');
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
     * @param  \App\Classes  $classes
     * @return \Illuminate\Http\Response
     */
    public function show(Classes $class)
    {
        return view('classes.show', compact('class'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Classes  $classes
     * @return \Illuminate\Http\Response
     */
    public function edit(Classes $class)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Classes  $classes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Classes $class)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Classes  $classes
     * @return \Illuminate\Http\Response
     */
    public function destroy(Classes $classes)
    {
        //
    }
}
