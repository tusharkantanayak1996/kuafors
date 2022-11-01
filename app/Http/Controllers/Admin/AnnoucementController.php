<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Announcement;
use App\User;
use App\Owner;

class AnnoucementController extends Controller
{
    public function annoucement()
    {
        $announcements = Announcement::get();
        return view('admin.announcement.announcement',compact('announcements'));
    }
    public function addAnnouncement()
    {
        $technicians = User::get();
        $owners = Owner::get();

        return view('admin.announcement.newannouncement',compact('technicians','owners'));
    }
    public function saveAnnouncement(Request $request)
    {
        $announcements = new Announcement();
        $announcements->technician_id = $request->technician_id;
        $announcements->owner_id = $request->owner_id;
        $announcements->message = $request->message;
        $announcements->save();
        return redirect(url('/admin/annoucement'))->with('flash_success', 'Announcement created successfully');
    }

    public function deleteAnnouncement($id)
    {
        $announcements = Announcement::find($id);
        $announcements->delete();

        return response()->json(['status'=>'Announcements Deleted Succesfully']);
    }
}
