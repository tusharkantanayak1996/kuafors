<?php

Route::get('/home', function () {
    $users[] = Auth::user();
    $users[] = Auth::guard()->user();
    $users[] = Auth::guard('owner')->user();

    //dd($users);

    return view('owner.home');
})->name('home');

