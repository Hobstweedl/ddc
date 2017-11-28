<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\PhoneType;
use \App\AddressType;
use \App\HowDidYouHear;
use \App\Location;


class AdminTablesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $phoneTypes = PhoneType::all();
        $addressTypes = AddressType::all();
        $howDidYouHearTypes = HowDidYouHear::all();
        $locationTypes = Location::all();
        return view('admin.tables', compact('phoneTypes', 'addressTypes', 'howDidYouHearTypes', 'locationTypes'));
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
     * @param  \App\AddressType  $addressType
     * @return \Illuminate\Http\Response
     */
    public function show(AddressType $addressType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\AddressType  $addressType
     * @return \Illuminate\Http\Response
     */
    public function edit(AddressType $addressType)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\AddressType  $addressType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AddressType $addressType)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\AddressType  $addressType
     * @return \Illuminate\Http\Response
     */
    public function destroy(AddressType $addressType)
    {
        //
    }
}
