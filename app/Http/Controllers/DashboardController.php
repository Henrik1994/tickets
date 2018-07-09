<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use App\Ticket;

class DashboardController extends Controller
{
   public function index()
    {
        $user = User::all()->toArray();

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
        return view('dashboard', compact('user','tickets','myticket'));
    }
}
