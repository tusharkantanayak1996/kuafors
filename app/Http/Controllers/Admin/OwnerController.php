<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Owner;
use App\Model\OwnerSubscriptionPlan;
use CreateOwnerPlansTable;

class OwnerController extends Controller
{
    public function index(Request $request)
    { 
        $owner = Owner::where('first_name','LIKE','%'.$request->search."%")->get();
        return view('admin.owner.index',compact('owner'));
    }
    public function editOwner($id)
    { 
        $owner = Owner::find($id);
        return view('admin.owner.editowner',compact('owner'));
    }

    public function updateOwner(Request $request,$id)
    {
        $owner=Owner::find($id);
        // return $owner;
        $owner->first_name = $request->first_name;
        $owner->last_name = $request->last_name;
        $owner->email = $request->email;
        $owner->business_name = $request->businessname;
        $owner->phone = $request->phone;
        $owner->address = $request->address;
        $owner->suburb = $request->suburb;
        $owner->state = $request->state;
        $owner->postcode = $request->postcode;
        $owner->abn = $request->abn;
        $owner->website = $request->website;
        $owner->years_of_operation = $request->yearofoperation;
        $owner->specialize_in = $request->specialise;
        $owner->country = $request->country;
        $owner->description = $request->description;
        if($request->has('file')){
            $username = 'orocaststudio';
            $object_type = 'others/';
            $object_id = $owner->id;
            $fileName = $this->uploadFile(request()->file('file'), $object_id, $object_type,$username);
            $imageurl = "https://". $username .".s3.amazonaws.com/".$object_type.$object_id.'/'.$fileName;
            $owner->image = $imageurl;
        }
        
        $owner->save();
        return redirect(url('/admin/owner'))->with('flash_success', 'owner edited successfully');
    }
    public function deleteOwner($id)
    {
        $ownerplan = OwnerSubscriptionPlan::where('owner_id',$id)->get();
        foreach($ownerplan as $owner){
            $owner->status = 'INACTIVE';
            $owner->save();
        }

        User::find($id)->delete();

        return redirect(url('/admin/owner'))->with('flash_success', 'owner deleted successfully');
    }
    
    public function disableOwner($id)
    {
        $ownerstatus = Owner::find($id);
        $ownerstatus->status = 'disable';
        $ownerstatus->save();
        if($ownerstatus->save()){
            $ownerplan = OwnerSubscriptionPlan::where('owner_id',$id)->get();
            foreach($ownerplan as $owner){
                $owner->status = 'INACTIVE';
                $owner->save();
            }
        }
        
        return redirect(url('/admin/owner'));
    }
    public function enableOwner($id)
    {
        $ownerstatus = Owner::find($id);
        $ownerstatus->status = 'enable';
        $ownerstatus->save();
        if($ownerstatus->save()){
            $ownerplan = OwnerSubscriptionPlan::where('owner_id',$id)->get();
            foreach($ownerplan as $owner){
                $owner->status = 'ACTIVE';
                $owner->save();
            }
        }
        return redirect(url('/admin/owner'));
    }

    //Ajax Call Start
    public function search(Request $request)
    {
      $search = $request->search;
      $results=Owner::where('first_name','LIKE','%'.$request->search."%")->get();
      if(!$results->isEmpty()){
        $output='';
        foreach ($results as $key => $product) {
            if($product->status == 'enable'){
                $output.='<tr>'.
                '<td class="text-center">'.$product->first_name.'</td>'.
                '<td class="text-center">'.$product->last_name.'</td>'.
                '<td class="text-center">'.$product->email.'</td>'.
                '<td class="text-center"><a href="/admin/edit-owner/'.$product->id.'" class="btn btn-light"><svg xmlns="http://www.w3.org/2000/svg" width="20px" height="20px"
                    viewBox="0 0 1101.688 979.443">
                    <path id="edit-regular"
                        d="M769.477,659.757l61.206-61.206c9.564-9.563,26.2-2.869,26.2,10.9V887.559a91.833,91.833,0,0,1-91.809,91.809H91.809A91.833,91.833,0,0,1,0,887.559V214.29a91.833,91.833,0,0,1,91.809-91.809H614.931c13.58,0,20.466,16.449,10.9,26.2l-61.206,61.206a15.164,15.164,0,0,1-10.9,4.4H91.809V887.559H765.078V670.468A15.044,15.044,0,0,1,769.477,659.757Zm299.528-385.982L566.732,776.049,393.824,795.176A79.017,79.017,0,0,1,306.6,707.957l19.127-172.908L828.006,32.776a111.632,111.632,0,0,1,158.18,0l82.628,82.628c43.8,43.8,43.8,114.762.191,158.371Zm-188.974,59.1L768.9,221.75,413.525,577.32l-13.963,124.9,124.9-13.963Zm123.943-152.442L921.345,97.807a19.971,19.971,0,0,0-28.308,0l-59.1,59.1L945.063,268.037l59.1-59.1A20.38,20.38,0,0,0,1003.974,180.436Z"
                        transform="translate(0 0.075)" />
                </svg></a>
                <a href="/admin/delete-owner/'.$product->id.'" class="btn btn-light"><svg xmlns="http://www.w3.org/2000/svg" width="20px" height="20px"
                                                viewBox="0 0 857.5 980">
                                                <path id="trash-alt-solid"
                                                    d="M61.25,888.125A91.875,91.875,0,0,0,153.125,980h551.25a91.875,91.875,0,0,0,91.875-91.875V245h-735Zm520.625-490a30.625,30.625,0,0,1,61.25,0v428.75a30.625,30.625,0,1,1-61.25,0Zm-183.75,0a30.625,30.625,0,0,1,61.25,0v428.75a30.625,30.625,0,0,1-61.25,0Zm-183.75,0a30.625,30.625,0,0,1,61.25,0v428.75a30.625,30.625,0,1,1-61.25,0ZM826.875,61.25H597.187L579.2,25.457A45.937,45.937,0,0,0,538.043,0H319.266A45.4,45.4,0,0,0,278.3,25.457L260.312,61.25H30.625A30.625,30.625,0,0,0,0,91.875v61.25A30.625,30.625,0,0,0,30.625,183.75h796.25A30.625,30.625,0,0,0,857.5,153.125V91.875A30.625,30.625,0,0,0,826.875,61.25Z"
                                                    transform="translate(0 0)" />
                                            </svg></a><a href="/admin/disable-owner/'.$product->id.'" class="btn btn-light">Disable</a></td></tr>';
            }else{
                $output.='<tr>'.
                '<td class="text-center">'.$product->first_name.'</td>'.
                '<td class="text-center">'.$product->last_name.'</td>'.
                '<td class="text-center">'.$product->email.'</td>'.
                '<td class="text-center"><a href="/admin/edit-owner/'.$product->id.'" class="btn btn-light"><svg xmlns="http://www.w3.org/2000/svg" width="20px" height="20px"
                    viewBox="0 0 1101.688 979.443">
                    <path id="edit-regular"
                        d="M769.477,659.757l61.206-61.206c9.564-9.563,26.2-2.869,26.2,10.9V887.559a91.833,91.833,0,0,1-91.809,91.809H91.809A91.833,91.833,0,0,1,0,887.559V214.29a91.833,91.833,0,0,1,91.809-91.809H614.931c13.58,0,20.466,16.449,10.9,26.2l-61.206,61.206a15.164,15.164,0,0,1-10.9,4.4H91.809V887.559H765.078V670.468A15.044,15.044,0,0,1,769.477,659.757Zm299.528-385.982L566.732,776.049,393.824,795.176A79.017,79.017,0,0,1,306.6,707.957l19.127-172.908L828.006,32.776a111.632,111.632,0,0,1,158.18,0l82.628,82.628c43.8,43.8,43.8,114.762.191,158.371Zm-188.974,59.1L768.9,221.75,413.525,577.32l-13.963,124.9,124.9-13.963Zm123.943-152.442L921.345,97.807a19.971,19.971,0,0,0-28.308,0l-59.1,59.1L945.063,268.037l59.1-59.1A20.38,20.38,0,0,0,1003.974,180.436Z"
                        transform="translate(0 0.075)" />
                </svg></a>
                <a href="/admin/delete-owner/'.$product->id.'" class="btn btn-light"><svg xmlns="http://www.w3.org/2000/svg" width="20px" height="20px"
                                                viewBox="0 0 857.5 980">
                                                <path id="trash-alt-solid"
                                                    d="M61.25,888.125A91.875,91.875,0,0,0,153.125,980h551.25a91.875,91.875,0,0,0,91.875-91.875V245h-735Zm520.625-490a30.625,30.625,0,0,1,61.25,0v428.75a30.625,30.625,0,1,1-61.25,0Zm-183.75,0a30.625,30.625,0,0,1,61.25,0v428.75a30.625,30.625,0,0,1-61.25,0Zm-183.75,0a30.625,30.625,0,0,1,61.25,0v428.75a30.625,30.625,0,1,1-61.25,0ZM826.875,61.25H597.187L579.2,25.457A45.937,45.937,0,0,0,538.043,0H319.266A45.4,45.4,0,0,0,278.3,25.457L260.312,61.25H30.625A30.625,30.625,0,0,0,0,91.875v61.25A30.625,30.625,0,0,0,30.625,183.75h796.25A30.625,30.625,0,0,0,857.5,153.125V91.875A30.625,30.625,0,0,0,826.875,61.25Z"
                                                    transform="translate(0 0)" />
                                            </svg></a><a href="/admin/enable-owner/'.$product->id.'" class="btn btn-light">Enable</a></td></tr>';
            }
           
        }
        return response()->json(['message'=>'success','data'=>$output],200);
      }else{
        return response()->json(['message' => 'Data Not Found !'],300);
      }
    
    } 
    //Ajax Call End
}
