<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profile;
use App\User;
use App\Auth;
use App\Ticket;

class ProfileController extends Controller
{
    public function index()
    {
        $my_id = \Auth::user()->id;
        $user = User::with('profile')->find($my_id);

        $all_tickets = Ticket::all();

        foreach($all_tickets as $ticket){
            $cat = explode(',', $ticket['user_id']);
            for($i = 0; $i < count($cat); $i++){
                if($cat[$i] == $my_id){
                  $tickets[] = $ticket; 
                  if($ticket['role'] == 1){
                    $myticket[] = $ticket;
                }  
                }
            }
        }

        return view('profile', compact('user','tickets','myticket'));
    }

    public function addProfile(Request $request)
    {
        if(isset($request['image'])){
            $destinationPath = 'img';
            $file = $request->file('image');
            $file->move($destinationPath, $file->getClientOriginalName());
            $filename = $file->getClientOriginalName();
        }else{
            $filename = '';
        }
     

        $my_id = \Auth::user()->id;
        $alldata = [
            'user_id' => $my_id,
            'firstName' => $request['firstName'],
            'lastName' => $request['lastName'],
            'adress' => $request['adress'],
            'city' => $request['adress'],
            'country' => $request['country'],
            'phone' => $request['postal'],
            'desc' => $request['desc'],
            'image' => $filename,
        ];



            Profile::create($alldata);
        return redirect()->back();
    }
}
