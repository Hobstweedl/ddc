<?php


Route::get('/', 'ClassesController@index');

Route::get('/families', 'FamiliesController@index');
Route::get('/families/{family}', 'FamiliesController@show');

Route::get('/students', 'StudentsController@index');
Route::get('/students/{student}', 'StudentsController@show');

Route::get('/classes', 'ClassesController@index');
Route::get('/classes/create', 'ClassesController@create');
Route::get('/classes/{class}', 'ClassesController@show');

Route::get('/seasons', 'SeasonsController@index');
Route::post('/seasons', 'SeasonsController@store');
Route::get('/seasons/{season}', 'SeasonsController@show');
