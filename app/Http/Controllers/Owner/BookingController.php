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
}