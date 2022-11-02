<?php

namespace App\Http\Controllers\Owner;

use Illuminate\Http\Request;
use App\Owner;
use Auth;
use App\Http\Controllers\Controller;

class TestController extends Controller
{
    public function secondHome()
    {
        return view('owner.second_home');
    }
    public function chooseType()
    {
        return view('owner.choosetype');
    }
    // public function ownerSubscribe(Request $request, $type)
    // {
    //     return view('owner.subscribe');
    // }
    public function subscribeOwner(Request $request, $type)
    {
        // echo $type; exit();
        return view('owner.subscribe');
    }
    public function saveType(Request $request)
    {
        // dd($request->all());
        $owner = Owner::find(Auth::guard('owner')->user()->id);
        $owner->type = $request->type;
        $owner->save();
        return redirect(url('/owner/subscribe'));

    }
}
