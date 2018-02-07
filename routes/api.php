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
    return App\Instructor::where('Active', '1')->orderBy('Last')->get();
});

//Get single instructor
Route::get('/instructors/{instructor}', function ($instructor) {
    return App\Instructor::where('id', $instructor)->get();
});