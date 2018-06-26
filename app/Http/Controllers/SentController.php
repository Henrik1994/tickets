<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SentController extends Controller
{
    public function index()
    {
        return view('sent');
    }   
}
