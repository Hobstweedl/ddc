<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//Get active instructors sorted by last name
Route::get('/instructors', function() {
    $instructors = App\Instructor::where('Active', '1')->orderBy('Last')->get();
    return Response::json($instructors);
});

//Get single instructor
Route::get('/instructors/{id}', function ($id) {
    $instructor = App\Instructor::where('id', $id)->get();
    return Response::json($instructor);
    //
});

//Get locations sorted by name
Route::get('/locations', function () {
    $locations = App\Location::orderBy('Type')->get();
    return Response::json($locations);
});

//Get single location
Route::get('/locations/{id}', function ($id) {
    $location = App\Location::where('id', $id)->get();
    return Response::json($location);
    //
});

//Get class types sorted by name
Route::get('/classtypes', function () {
    $classtypes = App\ClassType::orderBy('Name')->get();
    return Response::json($classtypes);
});

//Get single class type
Route::get('/classtypes/{id}', function ($id) {
    $classtype = App\ClassType::where('id', $id)->get();
    return Response::json($classtype);
    //
});

//Get seasons sorted by name
Route::get('/seasons', function () {
    $seasons = App\Season::where('Archived', 0)->orderBy('Name')->get();
    return Response::json($seasons);
});

//Get single season
Route::get('/seasons/{id}', function ($id) {
    $season = App\Season::where('id', $id)->get();
    return Response::json($season);
});