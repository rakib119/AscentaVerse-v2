<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BackendController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth');
    }
    public function dashboard()
    {
        return view('dashboard.dashboard');
    }

}
