<?php

namespace App\Http\Controllers;

use App\Instructor;
use Illuminate\Http\Request;

class InstructorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $instructors = Instructor::all();
        return view('instructors.index', compact('instructors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
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
            'Display' => 'required',
            'Email' => 'required',
            'Active' => ''
        ]);
        $instructor->save($validated);
        $request->session()->flash('alert-success', 'Saved instructor successfully!');
        $instructors = Instructor::all();
        return redirect()->action('InstructorsController@index', $instructors);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Instructor  $instructor
     * @return \Illuminate\Http\Response
     */
    public function show(Instructor $instructor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Instructor  $instructor
     * @return \Illuminate\Http\Response
     */
    public function edit(Instructor $instructor)
    {
        $instructors = Instructor::all();
        return view('instructors.index', compact('instructors', 'instructor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Instructor  $instructor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Instructor $instructor)
    {
        $validated = $request->validate([
            'First' => 'required',
            'Last' => 'required',
            'Display' => 'required',
            'Email' => 'required',
            'Active' => ''
        ]);
        $instructor->update($validated);
        $request->session()->flash('alert-success', 'Saved instructor successfully!');
        $instructors = Instructor::all();
        return redirect()->action('InstructorsController@edit', $instructor);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Instructor  $instructor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Instructor $instructor)
    {
        //
    }
}
