<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\User;
use App\Model\TechnicianSubscriptionPlan;
use App\Http\Controllers\Controller;

class TechnicianController extends Controller
{
    public function index()
    { 
        $technician = User::get();
        return view('admin.technician.index',compact('technician'));
    }

    public function editTechnician($id)
    { 
        $technician = User::find($id);
        return view('admin.technician.edittechnician',compact('technician'));
    }

    public function updateTechnician(Request $request,$id)
    {
        $technician=User::find($id);
        // return $technician;
        $technician->first_name = $request->first_name;
        $technician->last_name = $request->last_name;
        $technician->email = $request->email;
        $technician->business_name = $request->businessname;
        $technician->phone = $request->phone;
        $technician->address = $request->address;
        $technician->suburb = $request->suburb;
        $technician->state = $request->state;
        $technician->postcode = $request->postcode;
        $technician->abn = $request->abn;
        $technician->website = $request->website;
        $technician->years_of_operation = $request->yearofoperation;
        $technician->specialize_in = $request->specialise;
        $technician->country = $request->country;
        $technician->description = $request->description;
        if($request->has('file')){
            $username = 'orocaststudio';
            $object_type = 'others/';
            $object_id = $technician->id;
            $fileName = $this->uploadFile(request()->file('file'), $object_id, $object_type,$username);
            $imageurl = "https://". $username .".s3.amazonaws.com/".$object_type.$object_id.'/'.$fileName;
            $technician->image = $imageurl;
        }
        $technician->save();
        return redirect(url('/admin/technician'))->with('flash_success', 'technician edited successfully');
    }
    public function deleteTechnician($id)
    {
        $technicianplan = TechnicianSubscriptionPlan::where('technician_id',$id)->get();
        foreach($technicianplan as $technician){
            $technician->status = 'INACTIVE';
            $technician->save();       
         }
        Technician::find($id)->delete();
        return redirect(url('/admin/technician'))->with('flash_success', 'technician deleted successfully');
    }
}
