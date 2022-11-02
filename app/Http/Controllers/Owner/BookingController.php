<?php

namespace App\Http\Controllers\Owner;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BookingController extends Controller
{
    public function bookingRegister()
    {
        return view('owner.bookingregister');
    }
    public function ownerPayment()
    {
        return view('owner.ownerpayment');
    }
    public function createProfile()
    {
        return view('owner.createprofile');
    }
    public function myProfile()
    {
        return view('owner.profile');
    }
    public function chairAvailability()
    {
        return view('owner.chairavailable');
    }
}
