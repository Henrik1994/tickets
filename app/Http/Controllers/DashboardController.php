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

        $dones = Ticket::with('creator')->where('creator_id', $auth->id)->get();

        foreach($dones as $done){
            if($done['role'] == 6) {
                $doit[] = $done;
            }
            if($done['role'] == 5){
                $cant[] = $done;
              
            }
        }

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
            if(isset($tickets)){
                foreach($tickets as $t){
                    if($t['role'] == 6){
                        $arac[] = $t;
                    }
                    if($t['role'] == 5){
                        $charac[] = $t;
                    }
                }
            }
       

        return view('dashboard', compact('user','tickets','myticket','dones','doit','cant','arac','charac'));
    }
}
