<?php

namespace App\Http\Controllers\DashboardControllers\home;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\SingleSection;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\View;


class hs4Controller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $SingleSection = SingleSection::where('section_id',6)->first();
        $services = Service::where('section_id',6)->get();
        $data = ['data'=> $SingleSection,'services'=> $services];
        return view('dashboard.pages.home.section4.index',$data);
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'title'=>'required|max:50|unique:services,title',
            'thumbnail'=>'required|image|mimes:jpg,jpeg',
            'button_name'=>'required|max:25',
            'icon'=>'required|max:150',
            'short_description'=>'required|max:350',
        ]);

        try
        {
            $msg_str = uploadImage('public/assets/images/services/',$request,'thumbnail_hidden',1); //Custom Helpers
            $msgArr = explode('*',$msg_str);
            if($msgArr[0] == 1){
                $is_displayed = '0' ;
                if(isset($request->is_displayed_in_home))  $is_displayed='1';
                Service::insert([
                    'section_id'=>6,
                    'title'=>$request->title,
                    'slug'=> Str::slug($request->title),
                    'thumbnail'=>$msgArr[1],
                    'button_name'=>$request->button_name,
                    'icon'=>$request->icon,
                    'is_displayed_in_home'=> $is_displayed,
                    'short_description'=>$request->short_description,
                    'created_by'=>auth()->id(),
                    'created_at'=>Carbon::now(),
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
                'section_id'=>6,
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
        $service = Service::where('section_id',6)->findOrFail($id);
        $data = ['service'=> $service];
        return view('dashboard.pages.home.section4.edit',$data);
    }

    public function update(Request $request, string $id)
    {
        // return $request;
        $request->validate([
            'title'=>'required|max:50|unique:services,title,'.$id.',id',
            'thumbnail'=>'nullable|image|mimes:jpg,jpeg',
            'button_name'=>'required|max:25',
            'icon'=>'required|max:150',
            'short_description'=>'required|max:350',
        ]);
        try
        {
            $service = Service::findOrFail($id);
            $msg_str = uploadImage('public/assets/images/services/',$request,'thumbnail_hidden',1); //Custom Helpers
            $msgArr = explode('*',$msg_str);
            if($msgArr[0] == 1){


                if ($msgArr[1]!= 0) //IF uploaded image found
                {
                    $image_name = $msgArr[1];
                    $path = base_path('public/assets/images/services/' . $service->thumbnail);
                    $msg = insertDeleteLink($path,6); // Custom Function
                    if ($msg!=1)
                    {
                        return back()->with('error',$msg);
                    }
                    $service->thumbnail = $image_name;
                }
                $is_displayed = '0';
                if(isset($request->is_displayed_in_home))  $is_displayed='1';

                $service->title = $request->title;
                $service->button_name = $request->button_name;
                $service->icon = $request->icon;
                $service->slug = Str::slug($request->title) ;
                $service->is_displayed_in_home = $is_displayed;
                $service->short_description = $request->short_description;
                $service->updated_by = auth()->id();
                $service->save();

                return redirect()->route('homeS4.index')->with('success','Updated successfully');
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
            $service = Service::findOrFail($id);
            $file_location = base_path('public/assets/images/services/' .  $service->thumbnail);

            $msg = insertDeleteLink($file_location,6); //Custom Helpers
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
            $services = Service::where(['section_id'=>6])->get();

            $no_of_services = $services->count();
            if ($no_of_services<4 ) {
                return back()->with('error','At least 4 Services needed for published');
            }

            $SingleSection = SingleSection::where('section_id',6)->first();
            $no_of_data = $SingleSection->count();
            if ($no_of_data<1 ) {
                return back()->with('error','Please enter data for published');
            }

            $all_data = ['services'=> $services,'data'=> $SingleSection];
            // return  $data;
            $content = View::make('fontend.section.homePageSection.s4.s4Template',$all_data)->render();
            $content1 = View::make('fontend.section.services.serviceTemplate',$all_data)->render();

            // Path to the new static Blade view file
            $path = resource_path('views/fontend/section/homePageSection/s4/service.blade.php');
            $path1 = resource_path('views/fontend/section/services/all_service.blade.php');

            // Write the rendered content to the Blade view file
            file_put_contents($path, $content);
            file_put_contents($path1, $content1);

            $msg = deleteFile(6); //Custom helpers
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
