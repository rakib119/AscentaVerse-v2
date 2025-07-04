<?php

namespace App\Http\Controllers\DashboardControllers\home;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\DeletePhotoLink;
use App\Models\SingleSection;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class hs3LeftController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $photos = Banner::where('section_id',5)->get();
        $photos = ['photos'=> $photos];
        return view('dashboard.pages.home.section3.left.index',$photos);
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'image_name'=>'required|image|mimes:png|dimensions:width=144,height=40'
        ]);
        try
        {
            $msg_str = uploadImage('public/assets/images/partners/',$request,'image_name'); //Custom Helpers
            $msgArr = explode('*',$msg_str);

            if($msgArr[0] == 1){
                Banner::insert([
                    'image_name'=>$msgArr[1],
                    'section_id'=>5,
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
        $banner = Banner::where('section_id',5)->findOrFail($id);
        $data = ['banner'=> $banner];
        return view('dashboard.pages.home.section3.left.edit',$data);
    }
    /**
     * Display the specified resource.
     */
    public function published()
    {
        try
         {

            $SingleSection = SingleSection::where('section_id',4)->first();

            $Banner = Banner::where(['section_id'=>5,'status_active'=>1])->get();
            $no_of_photo = $Banner->count();
            /* if ($no_of_photo<6 ) {
                return back()->with('error','At least 6 logo needed for published');
            } */
            $data = ['banners'=> $Banner,'data'=> $SingleSection];
            // return  $data;
            $content = View::make('fontend.section.homePageSection.s3Left.s3LeftTemplate',$data)->render();

            // Path to the new static Blade view file
            $path = resource_path('views/fontend/section/homePageSection/s3Left/s3Left.blade.php');

            // Write the rendered content to the Blade view file
            file_put_contents($path, $content);

            $msg = deleteFile(5); //Custom helpers
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
        $request->validate([
            'image_name'=>'required|image|mimes:png|dimensions:width=144,height=40'
        ]);
        try
        {
            $banner = Banner::findOrFail($id);
            $msg_str = uploadImage('public/assets/images/partners/',$request,'image_name'); //Custom Helpers
            $msgArr = explode('*',$msg_str);
            if($msgArr[0] == 1){
                $image_name = $msgArr[1];
                $path = base_path('public/assets/images/partners/' . $banner->image_name);

                $msg = insertDeleteLink($path,5); // Custom Function
                if ($msg!=1)
                {
                    return back()->with('error',$msg);
                }
                $banner->image_name= $image_name;
                $banner->updated_by= auth()->id();
                $banner->save();
                return redirect()->route('homeS3Left.index')->with('success','Updated successfully');
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
        try
        {
            $banner = Banner::findOrFail($id);
            $file_location = base_path('public/assets/images/partners/' .  $banner->image_name);

            $msg = insertDeleteLink($file_location,5); //Custom Helpers
            if ($msg!=1)
            {
                return back()->with('error',$msg);
            }
            $banner->delete();

            return back()->with('success','Deleted successfully');
        }
        catch(Exception $e)
        {
            return back()->with('error',$e->getMessage());
        }
    }

}
