<?php

namespace App\Http\Controllers;

use App\Models\BlogCategories;
use App\Models\DynamicContent;
use App\Models\GenarelInfo;
use App\Models\SingleSection;
use App\Models\SocialIcon;
use App\Models\Team;
use Illuminate\Auth\Events\Authenticated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

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

        if (auth()->user()) {
            return redirect(route('social.home'));
        }
        else{
            return view('fontend.mainPages.index');
        }
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
    public function contact_us()
    {
        $dataArray = Session::get('contactData', []);

        if (count($dataArray)==0)
        {
            $data = SingleSection::select('lebel','title','short_description','description1','btn1','link1','link2')->where('section_id',12)->first();
            $dataArray= $data->toArray();

            $GenarelInfo = GenarelInfo::WhereIn('field_name',['contact_background','call_icon_img','message_icon_img' ,'address_icon_img'] )->get();
            foreach ($GenarelInfo as  $v)
            {
                $dataArray [$v?->field_name]= $v?->value	;
            }
            // return  $dataArray;
            Session::put('contactData', $dataArray);
        }

        return view('fontend.mainPages.contact',compact('dataArray'));
    }
    public function category_wise_blogs(Request $request,$category)
    {
        $blogs=DB::table('blog_categories','a')
        ->join('blogs as b', 'a.id', '=', 'b.category_id')
        ->select('b.*')
        ->where('a.name',$category)
        ->orderBy('b.created_at','desc')
        ->get();

        $data = GenarelInfo::select('value')->where('field_name','blog_background')->first();
        return view('fontend.mainPages.cat_blogs',compact('data','blogs'));
    }
    public function teams()
    {
        $data = GenarelInfo::select('value')->where('field_name','team_background')->first();
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
            if (!isset($categories[$v?->cat_id]['total_blogs']))
            {
                $categories[$v?->cat_id]['total_blogs'] = 0;
            }

            $categories[$v?->cat_id]['cat_name']   = $v?->cat_name;
            $categories[$v?->cat_id]['total_blogs']++;

            //BLOG ARRAY
            $blogs[$v?->blog_id]['title']        = $v?->title;
            $blogs[$v?->blog_id]['title']        = $v?->title;
            $blogs[$v?->blog_id]['created_at']   = $v?->created_at;
            $blogs[$v?->blog_id]['thumbnail']    = asset('assets/images/blogs/'.$v->thumbnail) ;
            $blogs[$v?->blog_id]['slug']         = $v?->slug;
        }
        $details = DB::table('blog_details','a')
            ->join('blogs as b', 'a.blog_id', '=', 'b.id')
            ->select('b.category_id','a.photo1','a.blog_id','a.photo2','a.video_link','a.photo3','a.content1','a.content2','b.slug')
            ->where('b.slug',$slug)
            ->first();
        // return $blogs;
        $data = GenarelInfo::select('value')->where('field_name','blog_background')->first();
        return view('fontend.detailsPages.blog_details',compact('data','categories','blogs','details'));
    }
    public function services_details($slug)
    {


        $details = DB::table('service_details','a')
            ->join('services as b', 'a.service_id', '=', 'b.id')
            ->select('a.photo1','a.service_id','a.photo2','a.photo3','a.content1','a.content2','b.slug')
            ->where('b.slug',$slug)
            ->first();
        // return $blogs;
        $data = GenarelInfo::select('value')->where('field_name','service_background')->first();
        return view('fontend.detailsPages.service_details',compact('data','details'));
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
        $GenarelInfo = GenarelInfo::WhereIn('field_name',['blog_background','call_icon_img','message_icon_img' ,'address_icon_img'] )->get();
        $photoArr = array();
        foreach ($GenarelInfo as  $v) {
            $photoArr [$v?->field_name]= $v?->value	;
        }
        // return  $photoArr;
        return view('fontend.detailsPages.team_details',compact('data','photoArr','iconArray'));
    }

    public function policies()
    {
        $data       = DynamicContent::find(1);
        $content    = $data->content;
        return view('fontend.mainPages.pageContainer',compact('content'));
    }
    public function terms_and_conditions()
    {
        $data       = DynamicContent::find(2);
        $content    = $data->content;
        return view('fontend.mainPages.pageContainer',compact('content'));
    }
    public function return_and_refund_policy()
    {
        $data       = DynamicContent::find(3);
        $content    = $data->content;
        return view('fontend.mainPages.pageContainer',compact('content'));
    }
    public function notice()
    {
        $data       = DynamicContent::find(4);
        $content    = $data->content;
        return view('fontend.mainPages.pageContainer',compact('content'));
    }
}
