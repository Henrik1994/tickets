<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profile;
use App\User;
use App\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        $my_id = \Auth::user()->id;
        $user = User::with('profile')->find($my_id);

        

        return view('profile', compact('user'));
    }

    public function addProfile(Request $request)
    {
        $my_id = \Auth::user()->id;
        $alldata = [
            'user_id' => $my_id,
            'firstName' => $request['firstName'],
            'lastName' => $request['lastName'],
            'adress' => $request['adress'],
            'city' => $request['adress'],
            'country' => $request['country'],
            'postal' => $request['postal'],
            'desc' => $request['desc'],
        ];



            Profile::create($alldata);
        return redirect()->back();
    }
}
