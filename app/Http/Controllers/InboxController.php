<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Auth;
use App\Ticket;
use App\User;
use App\Comment;
use App\Done;
use App\Closed;
use App\Witing;

class InboxController extends Controller
{
    public function index()
    {
        $my_id = \Auth::user()->id;
        $tickets = Ticket::with('user')->where('user_id', $my_id)->get();     
        $dones = Done::with('user')->where('user_id', $my_id)->orderBy('id','desc')->take(10)->get();  
        $witings = Witing::with('user')->where('user_id', $my_id)->orderBy('id','desc')->take(10)->get();  
        $closeds = Closed::with('user')->where('user_id', $my_id)->orderBy('id','desc')->take(10)->get();  
       
        return view('inbox', compact('tickets','dones','witings','closeds'));
    }

    public function addcomment(Request $request)
    {
            $comment = new Comment();
            $comment->user_id = $request['user_id'];
            $comment->ticket_id= $request['ticket_id'];
            $comment->comment = $request['comment'];
            $comment->save();

            return redirect()->back();
    }

    public function done(Request $request)
    {
      
        $done = new Done();
        $done->ticket_id = $request['ticket_id'];
        $done->user_id = $request['user_id'];
        $done->creator_id = $request['creator_id'];
        $done->creator_name = $request['creator_name'];
        $done->name = $request['name'];
        $done->title = $request['title'];
        $done->date = $request['date'];
        $done->priority = $request['priority'];
        $done->desc1 = $request['desc1'];
        $done->desc2 = $request['desc2'];
        $done->file = $request['file'];
        $done->save();

        $delTicket = Ticket::find($request['ticket_id']);
        $delTicket->delete();


        $response = array(
            'status' => 'success',
            'msg' => "Thenk you bro",
        );

        return response()->json($response); 
     
    }
    public function witing(Request $request)
    {
      
        $done = new Witing();
        $done->ticket_id = $request['ticket_id'];
        $done->user_id = $request['user_id'];
        $done->creator_id = $request['creator_id'];
        $done->creator_name = $request['creator_name'];
        $done->name = $request['name'];
        $done->title = $request['title'];
        $done->date = $request['date'];
        $done->priority = $request['priority'];
        $done->desc1 = $request['desc1'];
        $done->desc2 = $request['desc2'];
        $done->file = $request['file'];
        $done->save();

        $delTicket = Ticket::find($request['ticket_id']);
        $delTicket->delete();

        $response = array(
            'status' => 'success',
            'msg' => "Thenk you bro",
        );



        return response()->json($response); 
     
    }

    public function closed(Request $request)
    {
      
        $done = new Closed();
        $done->ticket_id = $request['ticket_id'];
        $done->user_id = $request['user_id'];
        $done->creator_id = $request['creator_id'];
        $done->creator_name = $request['creator_name'];
        $done->name = $request['name'];
        $done->title = $request['title'];
        $done->date = $request['date'];
        $done->priority = $request['priority'];
        $done->desc1 = $request['desc1'];
        $done->desc2 = $request['desc2'];
        $done->file = $request['file'];
        $done->save();

        $delTicket = Ticket::find($request['ticket_id']);
        $delTicket->delete();

        $response = array(
            'status' => 'success',
            'msg' => "Thenk you bro",
        );



        return response()->json($response); 
     
    }
}
