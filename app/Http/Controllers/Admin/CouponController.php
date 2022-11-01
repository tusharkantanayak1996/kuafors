<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Model\Coupon;
use App\Http\Controllers\Controller;

class CouponController extends Controller
{
    public function index()
    { 
        $coupon = Coupon::get();
        return view('admin.coupon.index',compact('coupon'));
    }

    public function addCoupon()
    {
        return view('admin.coupon.newcoupon');
    }
    public function saveCoupon(Request $request)
    {
        $coupon = new Coupon();
        $coupon->coupon_code = $request->code;
        $coupon->type = $request->coupon_type;
        $coupon->price = $request->value;
        $coupon->start_date = $request->start_date;
        $coupon->end_date = $request->end_date;
        $coupon->save();
        return redirect(url('/admin/coupons'))->with('flash_success', 'Coupon created successfully');
    }
    public function deleteCoupon($id)
    {
        Coupon::find($id)->delete();
        return response()->json(['status'=>'Coupon Deleted Succesfully']);
        // return redirect(url('/admin/coupons'))->with('flash_success', 'Coupon deleted successfully');
    }
}
