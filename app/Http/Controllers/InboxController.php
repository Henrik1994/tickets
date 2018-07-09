<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Ticket;
use App\User;
use App\Comment;

class InboxController extends Controller
{
    public function index()
    {
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
     
       
        return view('inbox', compact('tickets','myticket'));
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
    public function getcomment(Request $request)
    {
        $comments = Ticket::with('comment')->find($request['ticket_id']);
     
        $asd = explode(',',$comments['user_id']);

        for($i = 0; $i < count($comments['comment']); $i++){
                for($j = 0; $j < count($asd); $j++){
                    if($comments['comment'][$i]['user_id'] == $asd[$j]){
                        $user = User::find($comments['comment'][$i]['user_id']);
                         $comments['comment'][$i]['user_id'] = $user['name']; 
                    }
                }
        }

        $response = array(
            'status' => 'success',
            'comments' => $comments
        );

        return response()->json($response); 
    }

    public function done(Request $request)
    {

        $done = Ticket::find($request['ticket_id']);
        $done->user_id = $request['user_id'];
        $done->role = 2;
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


        $response = array(
            'status' => 'success',
            'msg' => "Thenk you bro",
        );

        return response()->json($response); 
     
    }
    public function witing(Request $request)
    {
      
        $done = Ticket::find($request['ticket_id']);
        $done->user_id = $request['user_id'];
        $done->role = 3;
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

        $response = array(
            'status' => 'success',
            'msg' => "Thenk you bro",
        );



        return response()->json($response); 
     
    }

    public function closed(Request $request)
    {
      
        $done = Ticket::find($request['ticket_id']);
        $done->user_id = $request['user_id'];
        $done->role = 4;
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

        $response = array(
            'status' => 'success',
            'msg' => "Thenk you bro",
        );



        return response()->json($response); 
     
    }
    public function end(Request $request)
    {
      
        $done = Ticket::find($request['ticket_id']);
        $done->user_id = $request['user_id'];
        $done->role = 6;
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

        $response = array(
            'status' => 'success',
            'msg' => "Thenk you bro",
        );



        return response()->json($response); 
     
    }
    public function cant(Request $request)
    {
      
        $done = Ticket::find($request['ticket_id']);
        $done->user_id = $request['user_id'];
        $done->role = 5;
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

        $response = array(
            'status' => 'success',
            'msg' => "Thenk you bro",
        );



        return response()->json($response); 
     
    }
}
