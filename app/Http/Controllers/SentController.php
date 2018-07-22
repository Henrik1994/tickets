<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Ticket;

class SentController extends Controller
{
    public function index()
    {
      $auth = Auth::user();
      $tickets = Ticket::with('user')->where('creator_id',$auth->id)->orderBy('id','desc')->get();
      

      $all_tickets = Ticket::all();

      foreach($all_tickets as $ticket){
          $cat = explode(',', $ticket['user_id']); 
          for($i = 0; $i < count($cat); $i++){
              if($cat[$i] == $auth->id){
                $mytickets[] = $ticket;  
                if($ticket['role'] == 1){
                    $donetickets[] = $ticket;
                } 
              }
          }
      }



        return view('sent', compact('tickets','mytickets','donetickets'));
    }   


    public function getpush()
    {
        $auth = Auth::user();
        $tickets = Ticket::with('user')->where('creator_id',$auth->id)->orderBy('id','desc')->get();

   
        foreach($tickets as $ticket){
            if($ticket['role'] == 2){
                $myticket[] = $ticket; 
                $response = [
                    'pusher' => $myticket
                ];
            }
        }


        return response()->json($response);

    }
}
