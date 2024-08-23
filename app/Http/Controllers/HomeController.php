<?php

namespace App\Http\Controllers;

use App\Models\BlogCategories;
use App\Models\GenarelInfo;
use App\Models\SocialIcon;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }


    public function index()
    {
        // return storeMenuIntoSession();
        return view('fontend.mainPages.index');
    }

    public function about()
    {
        $data = GenarelInfo::select('value')->where('field_name','about_background')->first();
        return view('fontend.mainPages.about',compact('data'));
    }
    public function services()
    {
        $data = GenarelInfo::select('value')->where('field_name','service_background')->first();
        return view('fontend.mainPages.services',compact('data'));
    }
    public function blogs()
    {
        $data = GenarelInfo::select('value')->where('field_name','blog_background')->first();
        return view('fontend.mainPages.blogs',compact('data'));
    }
    public function teams()
    {
        $data = GenarelInfo::select('value')->where('field_name','about_background')->first();
        return view('fontend.mainPages.teams',compact('data'));
    }
    public function kyc()
    {
        return view('fontend.mainPages.kyc');
    }
    public function blogs_details($slug)
    {
        $blogRes=DB::table('blog_categories','a')
            ->join('blogs as b', 'a.id', '=', 'b.category_id')
            ->select('a.id as cat_id', 'b.id as blog_id', 'a.name as cat_name','b.title','b.created_at','b.thumbnail','b.slug')
            ->orderBy('b.created_at','desc')
            ->get();
        $categories = $blogs =array();
        foreach ($blogRes as  $v)
        {
            //CATEGORIES ARRAY
            if (!isset($categories[$v->cat_id]['total_blogs']))
            {
                $categories[$v->cat_id]['total_blogs'] = 0;
            }

            $categories[$v->cat_id]['cat_name']   = $v->cat_name;
            $categories[$v->cat_id]['total_blogs']++;

            //BLOG ARRAY
            $blogs[$v->blog_id]['title']        = $v->title;
            $blogs[$v->blog_id]['title']        = $v->title;
            $blogs[$v->blog_id]['created_at']   = $v->created_at;
            $blogs[$v->blog_id]['thumbnail']    = asset('assets/images/blogs/'.$v->thumbnail) ;
            $blogs[$v->blog_id]['slug']         = $v->slug;
        }
        // return $blogs;
        $data = GenarelInfo::select('value')->where('field_name','blog-background')->first();
        return view('fontend.detailsPages.blog_details',compact('data','categories','blogs'));
    }
    public function team_member_dtls($slug)
    {
        $data = Team::where('slug',$slug)->first();
        $icons = SocialIcon::all();
        $iconArray = array();
        foreach ($icons as  $v)
        {
            $iconArray [$v->id] =  $v->icon;
        }
        $img = GenarelInfo::select('value')->where('field_name','blog-background')->first();
        return view('fontend.detailsPages.team_details',compact('data','img','iconArray'));
    }
}
