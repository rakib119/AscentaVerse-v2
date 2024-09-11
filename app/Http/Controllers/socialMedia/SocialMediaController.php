<?php

namespace App\Http\Controllers\socialMedia;

use App\Models\Contact;
use App\Models\Team;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SocialMediaController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth');
    }

    public function social_home()
    {
        $user      = auth()->id();
        return view('social-media.pages.home', compact('user'));
    }

}
