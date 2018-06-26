<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class DashboardController extends Controller
{
   public function index()
    {
        $user = User::all()->toArray();
        return view('dashboard', compact('user'));
    }
}
