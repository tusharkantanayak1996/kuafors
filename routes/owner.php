<?php

Route::get('/home', function () {
    $users[] = Auth::user();
    $users[] = Auth::guard()->user();
    $users[] = Auth::guard('owner')->user();

    //dd($users);

    return view('owner.home');
})->name('home');

Route::get('/location','OwnerlocationController@index');
Route::get('/locations','OwnerlocationController@location');
Route::post('/location/save','OwnerlocationController@savelocation');
Route::get('/delete/location/{id}','OwnerlocationController@delete');
Route::get('/editlocation/{id}','OwnerlocationController@editlocation');
Route::post('/edits/location/{id}','OwnerlocationController@editlocations');

