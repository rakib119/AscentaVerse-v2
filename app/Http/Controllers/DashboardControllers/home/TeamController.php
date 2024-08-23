<?php

namespace App\Http\Controllers\DashboardControllers\home;

use App\Http\Controllers\Controller;
use App\Models\SingleSection;
use App\Models\SocialIcon;
use App\Models\Team;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\View;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $SingleSection = SingleSection::where('section_id',8)->first();
        $teams = Team::where('section_id',8)->get();
        $social_icon = SocialIcon::all();
        $data = ['data'=> $SingleSection,'teams'=> $teams,'social_icons'=> $social_icon];
        return view('dashboard.pages.home.team.index',$data);
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'name'=>'required|max:50',
            'photo'=>'required|image|mimes:jpg,jpeg|dimensions:width=270,height=374',
            'designation'=>'required|max:35',
            'button_name'=>'required|max:25',
            'icon1'=>'required',
            'icon2'=>'required',
            'icon3'=>'required',
            'link1'=>'required|max:255',
            'link2'=>'required|max:255',
            'link3'=>'required|max:255',
            'details_title'=>'nullable|max:20',
            'phone'=>'required|max:40',
            'email'=>'required|max:200',
            'address'=>'required|max:255',
            'short_description'=>'required|max:500',
            'description'=>'nullable|max:3500',
        ]);

        try
        {
            $msg_str    = uploadImage('public/assets/images/teams/',$request,'photo'); //Custom Helpers
            $thumb_str  = uploadImage('public/assets/images/teams/',$request,'thumbnail',1); //Custom Helpers
            $msgArr     = explode('*',$msg_str);
            $thumbArr   = explode('*',$thumb_str);

            if($msgArr[0] == 1 && $thumbArr[0] == 1){
                $is_displayed = '0' ;
                if(isset($request->is_displayed_in_home))  $is_displayed='1';
                Team::insert([
                    'name'                  =>  $request->name,
                    'slug'                  =>  Str::slug($request->name)."-".strtotime(Carbon::now()),
                    'photo'                 =>  $msgArr[1],
                    'thumbnail'             =>  $thumbArr[1],
                    'designation'           =>  $request->designation,
                    'button_name'           =>  $request->button_name,
                    'icon1'                 =>  $request->icon1,
                    'icon2'                 =>  $request->icon2,
                    'icon3'                 =>  $request->icon3,
                    'link1'                 =>  $request->link1,
                    'link2'                 =>  $request->link2,
                    'link3'                 =>  $request->link3,
                    'phone'                 =>  $request->phone,
                    'email'                 =>  $request->email,
                    'details_title'         =>  $request->details_title,
                    'address'               =>  $request->address,
                    'short_description'     =>  $request->short_description,
                    'description'           =>  $request->description,
                    'section_id'            =>  8,
                    'is_displayed_in_home'  =>  $is_displayed,
                    'created_by'            =>  auth()->id(),
                    'created_at'            =>  Carbon::now(),
                ]);
                return back()->with('success','Added successfully');
            }else{
                return back()->with('error',$msg_str);
            }
        }
        catch (Exception $e)
        {
            return back()->with('error',$e->getMessage());
        }
    }
    public function title_store(Request $request)
    {
        $request->validate([
            'lebel'=>'required|max:40',
            'title'=>'required|max:150',
            'btn1'=>'required|max:25'
        ], [],
        [
            'btn1'=>'Button',
        ]);

        try
        {
            SingleSection::insert([
                'lebel'=>$request->lebel,
                'section_id'=>8,
                'title'=>$request->title,
                'btn1'=>$request->btn1,
                'created_by'=>auth()->id(),
                'created_at'=>Carbon::now(),
            ]);
            return back()->with('success','Added successfully');
        }
        catch (Exception $e)
        {
            return back()->with('error',$e->getMessage());
        }
    }

    public function title_update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'lebel'=>'required|max:40',
            'title'=>'required|max:150',
            'btn1'=>'required|max:25'
        ], [],
        [
            'btn1'=>'Button',
        ]);

        try {
            $SingleSection = SingleSection::findOrFail($id);
            $SingleSection->fill($validatedData)->save();

            return back()->with('success','Updated successfully');
        }
        catch (Exception $e)
        {
            return back()->with('error',$e->getMessage());
        }
    }

    public function edit(Request $request, string $enId)
    {
        $id = decrypt($enId);
        $social_icon = SocialIcon::all();
        $team = Team::where('section_id',8)->findOrFail($id);
        $data = ['team'=> $team,'social_icons'=> $social_icon];
        return view('dashboard.pages.home.team.edit',$data);
    }

    public function update(Request $request, string $id)
    {
        // return $request;
        $request->validate([
            'name'=>'required|max:50',
            'photo'=>'nullable|image|mimes:jpg,jpeg',//|dimensions:width=270,height=303
            'designation'=>'required|max:35',
            'button_name'=>'required|max:25',
            'icon1'=>'required',
            'icon2'=>'required',
            'icon3'=>'required',
            'link1'=>'required|max:255',
            'link2'=>'required|max:255',
            'link3'=>'required|max:255',
            'details_title'=>'nullable|max:20',
            'phone'=>'required|max:40',
            'email'=>'required|max:200',
            'address'=>'required|max:255',
            'short_description'=>'required|max:500',
            'description'=>'nullable|max:3500',
        ]);
        try
        {
            $service = Team::findOrFail($id);

            $msg_str    = uploadImage('public/assets/images/teams/',$request,'photo'); //Custom Helpers
            $thumb_str  = uploadImage('public/assets/images/teams/',$request,'thumbnail',1); //Custom Helpers
            $msgArr     = explode('*',$msg_str);
            $thumbArr   = explode('*',$thumb_str);

            if($msgArr[0] == 1 && $thumbArr[0] == 1){ 
                if ($msgArr[1]!= 0) //IF uploaded image found
                {
                    $image_name = $msgArr[1];
                    $thumbnail  = $thumbArr[1];
                    $path       = base_path('public/assets/images/teams/' . $service->photo);
                    $thumb_path = base_path('public/assets/images/teams/' . $service->thumbnail);
                    $msg        = insertDeleteLink($thumb_path,8); // Custom Function
                    $msg2       = insertDeleteLink($path,8); // Custom Function

                    if ($msg!=1)    {return back()->with('error',$msg);}
                    if ($msg2!=1)   {return back()->with('error',$msg2);}
                    $service->photo     = $image_name;
                    $service->thumbnail = $thumbnail;
                }
                $is_displayed = '0';
                if(isset($request->is_displayed_in_home))  $is_displayed='1';

                $service->name                  = $request->name;
                $service->designation           = $request->designation;
                $service->button_name           = $request->button_name;
                $service->icon1                 = $request->icon1;
                $service->icon2                 = $request->icon2;
                $service->icon3                 = $request->icon3;
                $service->link1                 = $request->link1;
                $service->link2                 = $request->link2;
                $service->link3                 = $request->link3;
                $service->phone                 = $request->phone;
                $service->email                 = $request->email;
                $service->details_title         = $request->details_title;
                $service->address               = $request->address;
                $service->short_description     = $request->short_description;
                $service->description           = $request->description;
                $service->is_displayed_in_home  = $is_displayed;
                // $service->slug = Str::slug($request->name)."-".strtotime(Carbon::now()) ;
                $service->updated_by = auth()->id();
                $service->save();

                return redirect()->route('team.index')->with('success','Updated successfully');
            }else{
                return back()->with('error',$msg_str);
            }
        }
        catch(Exception $e)
        {
            return back()->with('error',$e->getMessage());
        }
    }
    public function destroy($enId)
    {

        $id = decrypt($enId);
        try
        {
            $service = Team::findOrFail($id);
            $file_location = base_path('public/assets/images/teams/' .  $service->thumbnail);

            $msg = insertDeleteLink($file_location,8); //Custom Helpers
            if ($msg!=1)
            {
                return back()->with('error',$msg);
            }
            $service->delete();

            return back()->with('success','Deleted successfully');
        }
        catch(Exception $e)
        {
            return back()->with('error',$e->getMessage());
        }

    }

    public function published()
    {
        try
        {
            $teams = Team::where(['section_id'=>8])->get();
            // return returnArray('social_icons','id,icon','id','icon');

            $no_of_teams = $teams->count();
            if ($no_of_teams<4 ) {
                return back()->with('error','At least 4 teams needed for published');
            }


            $SingleSection = SingleSection::where('section_id',8)->first();

            $no_of_data = $SingleSection->count();
            if ($no_of_data<1 ) {
                return back()->with('error','Please enter section data for published');
            }
            $icons = SocialIcon::all();
            $iconArray = array();
            foreach ($icons as  $v)
            {
                $iconArray [$v->id] =  $v->icon;
            }
            // return  $iconArray;
            $all_data = ['teams'=> $teams,'data'=> $SingleSection,'iconArray'=> $iconArray];
            $content = View::make('fontend.section.homePageSection.team.teamTemplate',$all_data)->render();
            $content1 = View::make('fontend.section.about.teamTemplate',$all_data)->render();

            // Path to the new static Blade view file
            $path = resource_path('views/fontend/section/homePageSection/team/team.blade.php');
            $path1 = resource_path('views/fontend/section/about/all_team.blade.php');

            // Write the rendered content to the Blade view file
            file_put_contents($path, $content);
            file_put_contents($path1, $content1);

            $msg = deleteFile(8); //Custom helpers
            if($msg!=1){
                return back()->with('error',$msg);
            }
            return back()->with('success','Published Successfully');
        }
        catch(Exception $e)
        {
                $message = $e->getMessage();
                return back()->with('error',$message);
        }
    }
}
