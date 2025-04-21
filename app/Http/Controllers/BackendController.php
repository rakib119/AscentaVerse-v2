<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Team;
use App\Models\User;
use App\Models\UserInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BackendController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth');
    }
    public function dashboard()
    {
        // return session('permission_route');
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
    public function user_list()
    {
        $users = DB::table('users','a')
            ->select('a.id','a.name','a.email','a.verification_code','b.is_final_submited','b.mobile','b.user_id')
            ->leftJoin('user_infos as b', 'a.id', '=', 'b.user_id')
            ->get();

        return view('dashboard.pages.users', compact('users'));
    }


}
