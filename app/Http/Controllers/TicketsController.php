<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Ticket;

class TicketsController extends Controller
{
    public function index()
    {
        $users = User::with('profile')->get()->toArray();
        return view('tickets', compact('users'));
    }

    public function addticket(Request $request) 
    {
        $creator_id = \Auth::user()->id;
        $creator_name = \Auth::user()->name;

        
        if(isset($request['file'])){
            $destinationPath = 'img';
            $file = $request->file('file');
            $file->move($destinationPath, $file->getClientOriginalName());
            $filename = $file->getClientOriginalName();
        }

        $jan  = explode(',', $request['user_id']);

        for($i = 0; $i < count($jan); $i++){
            $ticket = new Ticket();
            $ticket->user_id = $jan[$i];
            $ticket->creator_id = $creator_id ;
            $ticket->creator_name  = $creator_name ;
            $ticket->name = $request['name'];
            $ticket->title = $request['title'];
            $ticket->date = $request['date'];
            $ticket->priority = $request['priority'];
            $ticket->desc1 = $request['desc1'];
            $ticket->desc2 = $request['desc2'];
            $ticket->file =  $filename ;
            $ticket->save();
        }



        return redirect('/inbox');

    }

    
}
