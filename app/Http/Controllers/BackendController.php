<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Team;
use App\Models\User;
use Illuminate\Http\Request;

class BackendController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth');
    }
    public function dashboard()
    {
        $users = User::orderBy('id', 'DESC')->get();
        $teams =  Team::all();
        $messages =  Contact::where('status', 0)->orderBy('id', 'DESC')->get();
        return view('dashboard.dashboard', compact('users', 'teams', 'messages'));

    }
    public function index()
    {
        $users      = User::orderBy('id', 'DESC')->get();
        $messages   = array();
        // $messages   = Contact::where('status', 0)->orderBy('id', 'DESC')->get();
        return view('dashboard.dashboard', compact('users','messages'));
    }

}
