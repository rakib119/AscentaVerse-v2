<?php

namespace App\Http\Controllers\socialMedia;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PackagePurchaseController extends Controller
{
    public function upgrade_to_premium()
    {
        $user = auth()->id();
        return view('socialMedia.pages.upgradeToPremium', compact('user'));
    }
    public function choose_plane($crypt_id)
    {
        $package_id = decrypt($crypt_id);
        $user       = auth()->id();
        return view('socialMedia.pages.choose_plane', compact('user'));
    }
}
