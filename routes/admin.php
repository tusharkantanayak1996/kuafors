<?php

Route::get('/home', function () {
    $users[] = Auth::user();
    $users[] = Auth::guard()->user();
    $users[] = Auth::guard('admin')->user();

    //dd($users);

    return view('admin.home');
})->name('home');

//Owner
Route::get('/owner', 'Admin\OwnerController@index');
Route::get('/edit-owner/{id}', 'Admin\OwnerController@editOwner');
Route::post('/update-owner/{id}', 'Admin\OwnerController@updateOwner');
Route::get('/delete-owner/{id}', 'Admin\OwnerController@deleteOwner');
Route::get('/disable-owner/{id}', 'Admin\OwnerController@disableOwner');
Route::get('/enable-owner/{id}', 'Admin\OwnerController@enableOwner');
Route::get('/search', 'Admin\OwnerController@search');




//Technician
Route::get('/technician', 'Admin\TechnicianController@index');
Route::get('/edit-technician/{id}', 'Admin\TechnicianController@editTechnician');
Route::post('/update-technician/{id}', 'Admin\TechnicianController@updateTechnician');
Route::get('/delete-technician/{id}', 'Admin\TechnicianController@deleteTechnician');

//Coupons
Route::get('/coupons', 'Admin\CouponController@index');
Route::get('/add-coupon', 'Admin\CouponController@addCoupon');
Route::post('/save-coupon', 'Admin\CouponController@saveCoupon');
Route::get('/delete-coupon/{id}', 'Admin\CouponController@deleteCoupon');


//Owner Plans
Route::get('/owner-plans', 'Admin\PlanController@ownerindex');
Route::get('/add-ownerplans', 'Admin\PlanController@addOwnerplan');
Route::post('/save-ownerplan', 'Admin\PlanController@saveOwnerplan');
Route::get('/edit-ownerplan/{id}', 'Admin\PlanController@editOwnerplan');
Route::post('/update-ownerplan/{id}', 'Admin\PlanController@updateOwnerplan');
Route::get('/delete-ownerplan/{id}', 'Admin\PlanController@deleteOwnerplan');


//Technician Plans
Route::get('/technician-plans', 'Admin\PlanController@technicianindex');
Route::get('/add-technicianplans', 'Admin\PlanController@addTechnicianplan');
Route::post('/save-technicianplan', 'Admin\PlanController@saveTechnicianplan');
Route::get('/edit-technicianplan/{id}', 'Admin\PlanController@editTechnicianplan');
Route::post('/update-technicianplan/{id}', 'Admin\PlanController@updateTechnicianplan');
Route::get('/delete-technicianplan/{id}', 'Admin\PlanController@deleteTechnicianplan');


//Add Questions For Type
Route::get('/question', 'Admin\QuestionController@index');
Route::get('/add-question', 'Admin\QuestionController@addQuestion');
Route::post('/save-question', 'Admin\QuestionController@saveQuestion');
Route::get('/edit-question/{id}', 'Admin\QuestionController@editQuestion');
Route::post('/update-question/{id}', 'Admin\QuestionController@updateQuestion');
Route::get('/question/{question_id}/delete', 'Admin\QuestionController@deleteQuestion');


//Subscription
Route::get('/cancelledsubscriptions', 'Admin\PlanController@CancelledSubscriptions');


//Annoucement
Route::get('/annoucement', 'Admin\AnnoucementController@annoucement');
Route::get('/add-announcement', 'Admin\AnnoucementController@addAnnouncement');
Route::post('/save-announcement', 'Admin\AnnoucementController@saveAnnouncement');
Route::get('/delete-ownerplan/{id}', 'Admin\AnnoucementController@deleteAnnouncement');