<?php

namespace App\Http\Controllers;
use App\Ownerlocation;

use Illuminate\Http\Request;

class OwnerlocationController extends Controller
{
     public function index()
     {
        $locations = Ownerlocation::get();
        return view('owner.location',compact('locations'));
     }

  public function location()
  {   
      return view('owner.createlocation');
  }

  public function savelocation(Request $request)
  {
      $location_save = new Ownerlocation();
      $location_save->location = $request->location;
      $location_save->total_no_of_chair = $request->total_no_of_chair;
      $location_save->total_no_of_room = $request->total_no_of_room;
      $location_save->total_no_of_space = $request->total_no_of_space;
      $location_save->save();
      return redirect(url('/owner/location'));
    
  }

  public function delete($id)
  {
     $locations = Ownerlocation::find($id)->delete();
     return back();
  }

 public function editlocation($id)
 {
     $edit_location = Ownerlocation::find($id);
     return view('owner.edit_location',compact('edit_location'));
 }

 public function editlocations(Request $request, $id)
 {
    $edit_locations = Ownerlocation::find($id);
    $edit_locations->location = $request->location;
    $edit_locations->total_no_of_chair = $request->total_no_of_chair;
    $edit_locations->total_no_of_room = $request->total_no_of_room;
    $edit_locations->total_no_of_space = $request->total_no_of_space;
    $edit_locations->update();
    return redirect('owner/location');
 }

}
