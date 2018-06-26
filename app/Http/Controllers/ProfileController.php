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
        $user = User::with('profile')->get();
        return view('profile', compact('user'));
    }

    public function addProfile(Request $request)
    {
        $alldata = [
            'user_id' => $request['ages'],
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
