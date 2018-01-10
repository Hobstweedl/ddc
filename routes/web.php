<?php
Route::middleware(['auth'])->group(function () {
  //Home
  Route::get('/', 'ClassesController@index');

  //Admin tables
  Route::get('/admin/tables', [
    'as' => 'admin.tables',
    'uses' => 'AdminTablesController@index'
  ]);

  //Family routes
  Route::get('/families/{family?}', [
    'as' => 'families',
    'uses' => 'FamiliesController@index'
  ]);

  //Student routes
  Route::get('/students', [
    'as' => 'students',
    'uses' => 'StudentsController@index'
  ]);
  Route::get('/students/{student}', [
    'as' => 'students.edit',
    'uses' => 'StudentsController@edit'
  ]);
  Route::get('students/create', [
    'as' => 'students.create',
    'uses' => 'StudentsController@create'
  ]);
  Route::post('/students', [
      'as' => 'students.store',
      'uses' => 'StudentsController@store'
  ]);
    Route::post('/students/{student}', [
        'as' => 'students.update',
        'uses' => 'StudentsController@update'
    ]);

  //Class routes
  Route::get('/classes', [
    'as' => 'classes',
    'uses' => 'ClassesController@index'
  ]);
  Route::get('/classes/create', [
    'as' => 'classes.create',
    'uses' => 'ClassesController@create'
  ]);
  Route::get('/classes/{class}', [
    'as' => 'classes.show',
    'uses' => 'ClassesController@show'
  ]);
  Route::get('/classes/season/{season}', [
        'as' => 'classes.season',
        'uses' => 'ClassesController@index'
    ]);

  //Season routes
  Route::get('/seasons', [
    'as' => 'seasons',
    'uses' => 'SeasonsController@index'
  ]);
  Route::get('/seasons/{season}', [
    'as' => 'seasons.show',
    'uses' => 'SeasonsController@show'
  ]);
  Route::get('/seasons/{season}/edit', [
    'as' => 'seasons.edit',
    'uses' => 'SeasonsController@edit'
  ]);
  //  THIS SHOULD BE A POST REQUEST
  Route::get('/seasons/{season}/delete', [
    'as' => 'seasons.delete',
    'uses' => 'SeasonsController@destroy'
  ]);
  //  Should this be create?
  Route::post('/seasons', [
    'as' => 'seasons.store',
    'uses' => 'SeasonsController@store'
  ]);
  Route::post('/seasons/{season}', [
    'as' => 'seasons.edit',
    'uses' => 'SeasonsController@update'
  ]);
  //Route::resource('seasons', 'SeasonsController');

  //Session routes
  Route::get('/sessions', [
    'as' => 'sessions',
    'uses' => 'SessionsController@index'
  ]);
  Route::get('/sessions/{session}', [
    'as' => 'sessions.show',
    'uses' => 'SessionsController@show'
  ]);
  Route::get('/sessions/{session}/edit', [
    'as' => 'sessions.edit',
    'uses' => 'SessionsController@edit'
  ]);
  Route::post('/sessions', [
    'as' => 'sessions.store',
    'uses' => 'SessionsController@store'
  ]);
  Route::post('/sessions/{session}', [
    'as' => 'sessions.update',
    'uses' => 'SessionsController@update'
  ]);

  //Class-type routes
  Route::get('/classtypes', [
    'as' => 'classtypes',
    'uses' => 'ClassTypesController@index'
  ]);
  Route::get('/classtypes/{classtype}', [
    'as' => 'classtypes.show',
    'uses' => 'ClassTypesController@show'
  ]);
  Route::get('/classtypes/{classtype}/edit', [
    'as' => 'classtypes.edit',
    'uses' => 'ClassTypesController@edit'
  ]);
  Route::post('/classtypes', [
    'as' => 'classtypes.store',
    'uses' => 'ClassTypesController@store'
  ]);
  Route::post('/classtypes/{classtype}', [
    'as' => 'classtypes.update',
    'uses' => 'ClassTypesController@update'
  ]);

  //Address-type routes
  Route::get('/addresstypes', [
    'as' => 'addresstypes',
    'uses' => 'AddressTypesController@index'
  ]);
  Route::get('/addresstypes/{addresstype}', [
    'as' => 'addresstypes.show',
    'uses' => 'AddressTypesController@show'
  ]);
  Route::get('/addresstypes/{addresstype}/edit', [
    'as' => 'addresstypes.edit',
    'uses' => 'AddressTypesController@edit'
  ]);
  Route::post('/addresstypes', [
    'as' => 'addresstypes.store',
    'uses' => 'AddressTypesController@store'
  ]);
  Route::post('/addresstypes/{addresstype}', [
    'as' => 'addresstypes.update',
    'uses' => 'AddressTypesController@update'
  ]);

  //Location routes
  Route::get('/locations', [
    'as' => 'locations',
    'uses' => 'LocationsController@index'
  ]);
  Route::get('/locations/{location}', [
    'as' => 'locations.show',
    'uses' => 'LocationsController@show'
  ]);
  Route::get('/locations/{location}/edit', [
    'as' => 'locations.edit',
    'uses' => 'LocationsController@edit'
  ]);
  Route::post('/locations', [
    'as' => 'locations.store',
    'uses' => 'LocationsController@store'
  ]);
  Route::post('/locations/{location}', [
    'as' => 'locationsupdate',
    'uses' => 'LocationsController@update'
  ]);

  //Phone-type routes
  Route::get('/phonetypes', [
    'as' => 'phonetypes',
    'uses' => 'PhoneTypesController@index'
  ]);
  Route::get('/phonetypes/{phonetype}', [
    'as' => 'phonetypes.show',
    'uses' => 'PhoneTypesController@show'
  ]);
  Route::get('/phonetypes/{phonetype}/edit', [
    'as' => 'phonetypes.edit',
    'uses' => 'PhoneTypesController@edit'
  ]);
  Route::post('/phonetypes', [
    'as' => 'phonetypes.store',
    'uses' => 'PhoneTypesController@store'
  ]);
  Route::post('/phonetypes/{phonetype}', [
    'as' => 'phonetypes.update',
    'uses' => 'PhoneTypesController@update'
  ]);

  //Rate routes
  Route::get('/rates', [
    'as' => 'rates',
    'uses' => 'RatesController@index'
  ]);
  Route::get('/rates/{rate}', [
    'as' => 'rates.show',
    'uses' => 'RatesController@show'
  ]);
  Route::get('/rates/{rate}/edit', [
    'as' => 'rates.edit',
    'uses' => 'RatesController@edit'
  ]);
  Route::post('/rates', [
    'as' => 'rates.store',
    'uses' => 'RatesController@store'
  ]);
  Route::post('/rates/{rate}', [
    'as' => 'rates.update',
    'uses' => 'RatesController@update'
  ]);

  //Instructor routes
  Route::get('/instructors', [
      'as' => 'instructors',
      'uses' => 'InstructorsController@index'
  ]);

    Route::get('/instructors/{instructor}', [
        'as' => 'instructors.edit',
        'uses' => 'InstructorsController@edit'
    ]);
    Route::post('/instructors/{instructor}', [
        'as' => 'instructors.update',
        'uses' => 'InstructorsController@update'
    ]);

  //Sortable route
  //This is bad work. Shouldn't ever bind a route to a 3rd party library or package route
  Route::post('/sort', [
    'as' => 'sort',
    'uses' => '\Rutorika\Sortable\SortableController@sort'
  ]);
});


Auth::routes();
Route::get('logout', function() {
  Auth::logout();
});
Route::get('/home', 'HomeController@index')->name('home');
