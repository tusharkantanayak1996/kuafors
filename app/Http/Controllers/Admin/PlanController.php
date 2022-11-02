<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Model\OwnerPlan;
use App\Model\TechnicianPlan;
use App\Http\Controllers\Controller;
use App\Helpers\Stripe;
use App\Model\OwnerSubscriptionPlan;
use App\Model\TechnicianSubscriptionPlan;

class PlanController extends Controller
{
    public function __construct(Stripe $stripe)
    {
        $this->stripe = $stripe;
    }
    //Owner Plan
    public function ownerindex()
    { 
        $ownerplan = OwnerPlan::get();
        return view('admin.plans.owner.index',compact('ownerplan'));
    }
    public function addOwnerplan()
    {
        return view('admin.plans.owner.newplan');
    }
    public function saveOwnerplan2(Request $request)
    {
        $ownerplan = new OwnerPlan();
        $ownerplan->name = $request->name;
        $ownerplan->type = $request->plan_type;
        $ownerplan->price = $request->price;
        $ownerplan->location = $request->location;
        $ownerplan->save();
        return redirect(url('/admin/owner-plans'))->with('flash_success', 'Plan created successfully');
    }

    public function saveOwnerplan(Request $request)
    {
    //    dd($request->all());
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'plan_type' => 'required',
            'description' => 'required'
        ]);

        $product = $this->stripe->createProduct($request->name,$request->description);
        
        $price = $this->stripe->createPrice($request->price,$request->plan_type,$product);
        //dd($request->description);

        $ownerplan = new OwnerPlan();
        $ownerplan->name = $request->name;
        $ownerplan->type = $request->plan_type;
        $ownerplan->price = $price->unit_amount / 100;
        $ownerplan->description = $request->description;
        $ownerplan->product_id = $price->product;
        $ownerplan->price_id= $price->id;
        $ownerplan->save();

        return redirect(url('/admin/owner-plans'))->with('flash_success', 'Plan created successfully');
    }
    public function editOwnerplan($id)
    { 
        $ownerplan = OwnerPlan::find($id);
        // return $ownerplan;
        return view('admin.plans.owner.editplan',compact('ownerplan'));
    }
    public function updateOwnerplan(Request $request,$id)
    {

        
        $product = $this->stripe->createProduct($request->name,$request->description);
        
        $price = $this->stripe->createPrice($request->price,$request->plan_type,$product);

        $ownerplan=OwnerPlan::find($id);
        // return $ownerplan;
        $ownerplan->name = $request->name;
        $ownerplan->type = $request->plan_type;
        $ownerplan->price = $request->price;
        $ownerplan->description = $request->description;
        $ownerplan->product_id = $price->product;
        $ownerplan->price_id= $price->id;
        // $ownerplan->location = $request->location;
        $ownerplan->save();
        return redirect(url('/admin/owner-plans'))->with('flash_success', 'ownerplan edited successfully');
    }
    public function deleteOwnerplan($id)
    {
        OwnerPlan::find($id)->delete();
        return response()->json(['status'=>'Owner Plan Deleted Succesfully']);
        // return redirect(url('/admin/owner-plans'))->with('flash_success', 'ownerplan deleted successfully');
    }

    //Technician Plan
    public function technicianindex()
    { 
        $technicianplan = TechnicianPlan::get();
        return view('admin.plans.technician.index',compact('technicianplan'));
    }
    public function addTechnicianplan()
    {
        return view('admin.plans.technician.newplan');
    }
    public function saveTechnicianplan(Request $request)
    {

        $product = $this->stripe->createProduct($request->name,$request->description);
        
        $price = $this->stripe->createPrice($request->price,$request->plan_type,$product);
        $technicianplan = new TechnicianPlan();
        $technicianplan->name = $request->name;
        $technicianplan->type = $request->plan_type;
        $technicianplan->price = $request->price;
        $technicianplan->product_id = $price->product;
        $technicianplan->price_id= $price->id;
        $technicianplan->description = $request->description;

        $technicianplan->save();
        return redirect(url('/admin/technician-plans'))->with('flash_success', 'Plan created successfully');
    }
    public function editTechnicianplan($id)
    { 
        $technicianplan = TechnicianPlan::find($id);
        // return $ownerplan;
        return view('admin.plans.technician.editplan',compact('technicianplan'));
    }
    public function updateTechnicianplan(Request $request,$id)
    {
        
        $product = $this->stripe->createProduct($request->name,$request->description);
        
        $price = $this->stripe->createPrice($request->price,$request->plan_type,$product);

        $technicianplan = TechnicianPlan::find($id);

        $technicianplan->name = $request->name;
        $technicianplan->type = $request->plan_type;
        $technicianplan->price = $request->price;
        $technicianplan->description = $request->description;
        $technicianplan->product_id = $price->product;
        $technicianplan->price_id= $price->id;

        $technicianplan->save();
        return redirect(url('/admin/technician-plans'))->with('flash_success', 'technicianplan edited successfully');
    }
    public function deleteTechnicianplan($id)
    {
        TechnicianPlan::find($id)->delete();
        return response()->json(['status'=>'Technician Plan Deleted Succesfully']);
        // return redirect(url('/admin/technician-plans'))->with('flash_success', 'technicianplan deleted successfully');
    }

    public function CancelledSubscriptions()
    { 
        $ownerplan = OwnerPlan::get();
        $cancelledtechnicians = TechnicianSubscriptionPlan::with('users','technicianplan')->where('status','INACTIVE')->get();
        $cancelledowners = OwnerSubscriptionPlan::with('users','ownerplan')->where('status','INACTIVE')->get();
        return view('admin.plans.cancelledsubscription',compact('cancelledtechnicians','cancelledowners'));
    }
}
