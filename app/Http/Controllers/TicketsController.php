<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Ticket;
use Auth;
use Mail;

class TicketsController extends Controller
{
    public function index()
    {
        $users = User::with('profile')->get()->toArray();

        $auth = Auth::user();
      
        $all_tickets = Ticket::all();

        foreach($all_tickets as $ticket){
            $cat = explode(',', $ticket['user_id']);
          
            for($i = 0; $i < count($cat); $i++){
                if($cat[$i] == $auth->id){
                  $tickets[] = $ticket; 
                  if($ticket['role'] == 1){
                    $myticket[] = $ticket;
                }  
                }
            }
        }
        return view('tickets', compact('users','tickets','myticket'));
    }

    public function edit($id)
    {
        $users = User::with('profile')->get()->toArray();
        $auth = Auth::user();
        $all_tickets = Ticket::all();
        $editticket = Ticket::find($id);

        foreach($all_tickets as $ticket){
            $cat = explode(',', $ticket['user_id']);
         
            for($i = 0; $i < count($cat); $i++){
                if($cat[$i] == $auth->id){
                  $tickets[] = $ticket;  
                  if($ticket['role'] == 1){
                    $myticket[] = $ticket;
                } 
                }
            }
        }

    

        return view('edit', compact('users','tickets','myticket','editticket') );

    }


    public function update(Request $request)
    {
      
        $creator_id = \Auth::user()->id;
        $creator_name = \Auth::user()->name;

        
        if(isset($request['file'])){
            $destinationPath = 'img';
            $file = $request->file('file');
            $file->move($destinationPath, $file->getClientOriginalName());
            $filename = $file->getClientOriginalName();
        }else{
            $filename = ''; 
        }

 
            $ticket = Ticket::find($request['ticket_id']);
            $ticket->user_id = $request['user_id'];
            $ticket->role = 1;
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
        
        
            return redirect('/inbox');
    }



    public function addticket(Request $request) 
    {
        $creator_id = \Auth::user()->id;
        $creator_name = \Auth::user()->name;
        $email = \Auth::user()->email;

        
        if(isset($request['file'])){
            $destinationPath = 'img';
            $file = $request->file('file');
            $file->move($destinationPath, $file->getClientOriginalName());
            $filename = $file->getClientOriginalName();
        }else{
            $filename = ''; 
        }

 
            $ticket = new Ticket();
            $ticket->user_id = $request['user_id'];
            $ticket->role = 1;
            $ticket->creator_id = $creator_id ;
            $ticket->creator_name  = $creator_name ;
            $ticket->name = $request['name'];
            $ticket->title = $request['title'];
            $ticket->date = $request['date'];
            $ticket->priority = $request['priority'];
            $ticket->desc1 = $request['desc1'];
            $ticket->desc2 = $request['desc2'];
            $ticket->file =  $filename ;
            // $ticket->save();


            $user_id = $request['user_id'];
            $users = explode(',',$user_id);
                
                foreach($users as $user){
                    $get = User::find($user); 

                    $data = [
                        'email' => $email,
                        'subject' => $request['title'],
                        'bodyMessage' => $request['desc1'],
                        'user' => $get['email']
                    ];
        
                    Mail::send('inbox', $data, function($message) use($data){
                        $message->to($data['email'])->subject($data['subject']);
                        $message->from($data['user']);
                    });
                }



        return redirect('/inbox');

    }

    
}
