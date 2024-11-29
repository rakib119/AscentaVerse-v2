<?php

namespace App\Http\Controllers\socialMedia;

use App\Http\Controllers\Controller;
use App\Models\SocialPackageBreakDown;
use App\Models\SocialPackageFeatureDtls;
use App\Models\SocialPackageMst;
use Illuminate\Http\Request;

class PackagePurchaseController extends Controller
{
    public function upgrade_to_premium()
    {
        $package = SocialPackageMst::select('id','package_name','short_desc','price','discount_per','discounted_amount','renewable_message')->where('status_active',1)->where('is_deleted',0)->get();
        $package_features = SocialPackageFeatureDtls::select('id','mst_id','feature','short_desc')->where('status_active',1)->where('is_deleted',0)->get();
        return view('socialMedia.pages.upgradeToPremium', compact('package','package_features'));
    }
    public function choose_plane($crypt_id)
    {
        $package_id = decrypt($crypt_id);
        return $break_down = SocialPackageBreakDown::select('id','mst_id','sub_package_name','desc_link','price','discount_per','discounted_amount')->where('status_active',1)->where('is_deleted',0)->where('mst_id',$package_id)->get();
         view('socialMedia.pages.choose_plane', compact('break_down'));
    }
}
