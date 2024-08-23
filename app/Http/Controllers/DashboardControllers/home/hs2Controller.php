<?php

namespace App\Http\Controllers\DashboardControllers\home;

use App\Http\Controllers\Controller;
use App\Models\SingleSection;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\View;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
class hs2Controller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $SingleSection = SingleSection::where('section_id',3)->first();
        $data = ['data'=> $SingleSection];
        return view('dashboard.pages.home.section2.index',$data);
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // return $request;
        try
        {
            $request->validate([
                'lebel'=>'required|max:40',
                'title'=>'required|max:150',
                'short_description'=>'required|max:600',
                'btn1'=>'required|max:150',
                'btn2'=>'required|max:150',
                'btn3'=>'required|max:150',
                'link1'=>'required|max:255',
                'link2'=>'required|max:150',
                'img1'=>'required|mimes:jpg,jpeg,png|dimensions:width=330,height=415', // photo
                'img2'=>'required|max:50',
                'description1'=>'required|max:6000',
                'description2'=>'required|max:6000',
                'description3'=>'required|max:6000',
            ], [],
            [
                'btn1'=>'Button 1',
                'btn2'=>'Button 2',
                'btn3'=>'Button 3',
                'link1' => 'Video 1 Caption ',
                'link2'=> 'Video 1 link',
                'img1'=> 'Photo',
                'img2'=> 'Photo Caption'
            ]);

            if ($request->hasFile('img1')) {
                $manager = new ImageManager(new Driver());
                $image_file = $request->file('img1');
                $image_name = Str::random(15).'.'.$image_file->getClientOriginalExtension();
                $image = $manager->read($image_file);
                // $image = $image->resize(300,300);

                $path = base_path('public/assets/images/about/' . $image_name);
                $image->save($path);

            }
            SingleSection::insert([
                'lebel'             => $request->lebel,
                'title'             => $request->title,
                'section_id'        => 3,
                'short_description' => $request->short_description,
                'btn1'              => $request->btn1,
                'btn2'              => $request->btn2,
                'btn3'              => $request->btn3,
                'link1'             => $request->link1,
                'link2'             => $request->link2,
                'img1'              => $image_name,
                'img2'              => $request->img2,
                'created_by'        => auth()->id(),
                'created_at'        => Carbon::now(),
            ]);
            return back()->with('success','Added successfully');
        }
        catch(Exception $e)
        {
            return back()->with('codeError',$e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function published()
    {
       try
        {
            $SingleSection = SingleSection::where('section_id',3)->first();
            $data = ['data'=> $SingleSection];
            // return  $data;
            $content = View::make('fontend.section.homePageSection.s2About.about_section_template',$data)->render();
            // Path to the new static Blade view file
            $path = resource_path('views/fontend/section/homePageSection/s2About/about_section.blade.php');

            // Write the rendered content to the Blade view file
            file_put_contents($path, $content);
            return back()->with('success','Published Successfully');
        }
        catch(Exception $e)
        {
            $message = $e->getMessage();
            return back()->with('codeError',$message);
        }
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'lebel'=>'required|max:40',
            'title'=>'required|max:150',
            'short_description'=>'required|max:600',
            'btn1'=>'required|max:150',
            'btn2'=>'required|max:150',
            'btn3'=>'required|max:150',
            'link1'=>'required|max:255',
            'link2'=>'required|max:150',
            'img2'=>'required|max:50',
            'description1'=>'required|max:6000',
            'description2'=>'required|max:6000',
            'description3'=>'required|max:6000',
        ], [],
        [
            'btn1'=>'Button 1',
            'btn2'=>'Button 2',
            'btn3'=>'Button 3',
            'link1' => 'Video 1 Caption ',
            'link2'=> 'Video 1 link',
            'img1'=> 'Photo',
            'img2'=> 'Photo Caption'
        ]);


        try
        {
            $SingleSection = SingleSection::findOrFail($id);

            if ($request->hasFile('img1')) {
                $request->validate([
                    'img1'=>'required|mimes:jpg,jpeg,png|dimensions:width=330,height=415' // photo
                ], [],
                [
                    'img1'=> 'Photo'
                ]);
                $manager = new ImageManager(new Driver());
                $image_file = $request->file('img1');
                $image_name = Str::random(15).'.'.$image_file->getClientOriginalExtension();
                $image = $manager->read($image_file);
                // $image = $image->resize(300,300);

                $path = base_path('public/assets/images/about/' . $image_name);
                $image->save($path);
                $SingleSection->img1                = $image_name;
            }

            $SingleSection->lebel               = $request->lebel;
            $SingleSection->title               = $request->title;
            $SingleSection->short_description   = $request->short_description;
            $SingleSection->btn1                = $request->btn1;
            $SingleSection->btn2                = $request->btn2;
            $SingleSection->btn3                = $request->btn3;
            $SingleSection->link1               = $request->link1;
            $SingleSection->link2               = $request->link2;
            $SingleSection->img2                = $request->img2;
            $SingleSection->description1        = $request->description1;
            $SingleSection->description2        = $request->description2;
            $SingleSection->description3        = $request->description3;
            $SingleSection->updated_by          = auth()->id();
            $SingleSection->save();

            return back()->with('success','Updated successfully');
        }
        catch (Exception $e)
        {
            return back()->with('codeError',$e->getMessage());
        }
    }

}
