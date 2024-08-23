<?php

namespace App\Http\Controllers\DashboardControllers\home;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\SingleSection;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class hs1RightController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $banners = Banner::where('section_id',2)->get();
        $banners = ['banners'=> $banners];
        return view('dashboard.pages.home.section1.right.index',$banners);
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try
        {
            $request->validate([
                'image_name'=>'required|mimes:png,jpg|dimensions:width=800,height=400'
            ]);

            $msg_str = uploadImage('public/assets/images/banners/',$request,'image_name'); //Custom Helpers
            $msgArr = explode('*',$msg_str);

            if($msgArr[0] == 1){
                Banner::insert([
                    'image_name'=>$msgArr[1],
                    'section_id'=>2,
                    'status_active'=>1,
                    'created_at'=>Carbon::now(),
                ]);
                return back()->with('success','Added successfully');
            }else{
                return back()->with('error',$msg_str);
            }
        }
        catch(Exception $e)
        {
            return back()->with('error',$e->getMessage());
        }
    }
    public function edit(Request $request, string $id)
    {
        $banner = Banner::where('section_id',2)->findOrFail($id);
        $data = ['banner'=> $banner];
        return view('dashboard.pages.home.section1.right.edit',$data);
    }
    /**
     * Display the specified resource.
     */
    public function published()
    {
        try
         {
            $SingleSection = SingleSection::where('section_id',1)->first();
            $Banner = Banner::where(['section_id'=>2,'status_active'=>1])->get();
            $data = ['banners'=> $Banner,'data'=> $SingleSection];
            // return  $data;
            $content = View::make('fontend.section.homePageSection.s1Right.s1RightTemplate',$data)->render();

            // Path to the new static Blade view file
            $path = resource_path('views/fontend/section/homePageSection/s1Right/s1Right.blade.php');

            // Write the rendered content to the Blade view file
            file_put_contents($path, $content);

            $msg = deleteFile(2); //Custom helpers
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

    public function update(Request $request, string $id)
    {
        try
        {
            $request->validate([
                'image_name'=>'required|mimes:png,jpg|dimensions:width=800,height=400'
            ]);
            $banner = Banner::findOrFail($id);

            $msg_str = uploadImage('public/assets/images/banners/',$request,'image_name'); //Custom Helpers
            $msgArr = explode('*',$msg_str);
            if($msgArr[0] == 1){
                $image_name = $msgArr[1];
                $path = base_path('public/assets/images/banners/' . $banner->image_name);

                $msg = insertDeleteLink($path,2); // Custom Function
                if ($msg!=1)
                {
                    return back()->with('error',$msg);
                }
                $banner->image_name= $image_name;
                $banner->updated_by= auth()->id();
                $banner->save();
                return redirect()->route('homeS1Right.index')->with('success','Updated successfully');
            }else{
                return back()->with('error',$msg_str);
            }
        }
        catch(Exception $e)
        {
            return back()->with('error',$e->getMessage());
        }
    }
    public function destroy(Request $request, string $id){
        $banner         = Banner::findOrFail($id);
        $file_location  = base_path('public/assets/images/banners/' .  $banner->image_name);

        $msg = insertDeleteLink($file_location,2); //Custom Helpers
        if ($msg!=1)
        {
            return back()->with('error',$msg);
        }
        $banner->delete();

        return back()->with('success','Deleted successfully');
    }

}
