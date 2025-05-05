<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller  // <-- This should extend the base Controller class
{
    public function __construct()
    {
        $this->middleware('auth'); // Applying middleware correctly
    }

    public function index()
    {
        return view('home');  // Ensure 'home' view exists
    }
}
