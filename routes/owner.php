<?php

Route::get('/home', function () {
    $users[] = Auth::user();
    $users[] = Auth::guard()->user();
    $users[] = Auth::guard('owner')->user();

    //dd($users);

    return view('owner.home');
})->name('home');
Route::get('/home-index','Owner\TestController@secondHome');
Route::get('/choose-type','Owner\TestController@chooseType');
Route::get('/choose-type/{type}/subscribe','Owner\TestController@subscribeOwner');
// Route::get('/subscribe','Owner\TestController@ownerSubscribe');
Route::post('/store-type','Owner\TestController@saveType');

Route::get('/booking-register','Owner\BookingController@bookingRegister');

Route::get('/owner-payment','Owner\BookingController@ownerPayment');



//Location
Route::get('/location','OwnerlocationController@index');
Route::get('/locations','OwnerlocationController@location');
Route::post('/location/save','OwnerlocationController@savelocation');
Route::get('/delete/location/{id}','OwnerlocationController@delete');
Route::get('/editlocation/{id}','OwnerlocationController@editlocation');
Route::post('/edits/location/{id}','OwnerlocationController@editlocations');
//End Location

//Support
  Route::get('/support','SupportController@supporindex');
  Route::get('/techician-ticket','SupportController@ticketindex');
  Route::post('/storetickets','SupportController@ticketstore');
//End Support

//coupon 


//End Coupon




