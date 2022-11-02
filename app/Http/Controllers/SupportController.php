<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ticket;
use Auth;

class SupportController extends Controller
{
     public function supporindex()
     {
         return view('owner.support.index');
     }

public function ticketindex()
{
    return view('owner.support.technician_ticket');
}

public function ticketstore(Request $request)
{
    $ticketsave = new Ticket();
    $ticketsave->name = $request->name;
    $ticketsave->description = $request->description;
    $ticketsave->start_of_issue = $request->start_of_issue;
    $ticketsave->priority = $request->priority;

    if (request()->hasFile('file'))
      { $files = $request->file('file');
     $ticket_file = strtolower(rand(1000,9999).time().'.'.$files->getClientOriginalExtension());
     $files->move(public_path('/file'),$ticket_file);
     $ticketsave->file = $ticket_file; 
     }
   
     $ticketsave->owner_id =Auth::user()->id;
     $ticketsave->status = 'open';
     $ticketsave->type = 'owner';
     $ticketsave->save();
    return redirect(url('owner/support'));
    
}

}
