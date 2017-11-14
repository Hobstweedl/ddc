<?php

//Home
Route::get('/', 'ClassesController@index');

//Family routes
Route::get('/families', 'FamiliesController@index');
Route::get('/families/{family}', 'FamiliesController@show');

//Student routes
Route::get('/students', 'StudentsController@index');
Route::get('/students/{student}', 'StudentsController@show');

//Class routes
Route::get('/classes', 'ClassesController@index');
Route::get('/classes/create', 'ClassesController@create');
Route::get('/classes/{class}', 'ClassesController@show');

//Season routes
Route::get('/seasons', 'SeasonsController@index');
Route::get('/seasons/{season}', 'SeasonsController@show');
Route::get('/seasons/{season}/edit', 'SeasonsController@edit');
Route::get('/seasons/{season}/delete', 'SeasonsController@destroy');
Route::post('/seasons', 'SeasonsController@store');
Route::post('/seasons/{season}', 'SeasonsController@update');
//Route::resource('seasons', 'SeasonsController');

//Session routes
Route::get('/sessions', 'SessionsController@index');
Route::get('/sessions/{session}', 'SessionsController@show');
Route::get('/sessions/{session}/edit', 'SessionsController@edit');
Route::post('/sessions', 'SessionsController@store');
Route::post('/sessions/{session}', 'SessionsController@update');

//Class-type routes
Route::get('/classtypes', 'ClassTypesController@index');
Route::get('/classtypes/{classtype}', 'ClassTypesController@show');
Route::get('/classtypes/{classtype}/edit', 'ClassTypesController@edit');
Route::post('/classtypes', 'ClassTypesController@store');
Route::post('/classtypes/{classtype}', 'ClassTypesController@update');

//Address-type routes
Route::get('/addresstypes', 'AddressTypesController@index');
Route::get('/addresstypes/{addresstype}', 'AddressTypesController@show');
Route::get('/addresstypes/{addresstype}/edit', 'AddressTypesController@edit');
Route::post('/addresstypes', 'AddressTypesController@store');
Route::post('/addresstypes/{addresstype}', 'AddressTypesController@update');

//Location routes
Route::get('/locations', 'LocationsController@index');
Route::get('/locations/{location}', 'LocationsController@show');
Route::get('/locations/{location}/edit', 'LocationsController@edit');
Route::post('/locations', 'LocationsController@store');
Route::post('/locations/{location}', 'LocationsController@update');

//Phone-type routes
Route::get('/phonetypes', 'PhoneTypesController@index');
Route::get('/phonetypes/{phonetype}', 'PhoneTypesController@show');
Route::get('/phonetypes/{phonetype}/edit', 'PhoneTypesController@edit');
Route::post('/phonetypes', 'PhoneTypesController@store');
Route::post('/phonetypes/{phonetype}', 'PhoneTypesController@update');

//Rate routes
Route::get('/rates', 'RatesController@index');
Route::get('/rates/{rate}', 'RatesController@show');
Route::get('/rates/{rate}/edit', 'RatesController@edit');
Route::post('/rates', 'RatesController@store');
Route::post('/rates/{rate}', 'RatesController@update');

//Sortable route
Route::post('/sort', '\Rutorika\Sortable\SortableController@sort');