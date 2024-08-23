<?php

namespace App\Http\Controllers\DashboardControllers\home;

use App\Http\Controllers\Controller;
use App\Models\SingleSection;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class hs1LeftController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $SingleSection = SingleSection::where('section_id',1)->first();
        $data = ['data'=> $SingleSection];
        return view('dashboard.pages.home.section1.left.index',$data);
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'lebel'=>'required|max:40',
            'title'=>'required|max:150',
            'short_description'=>'required|max:600',
            'btn1'=>'nullable|max:150',
            'link1'=>'nullable|max:255',
            'btn2'=>'nullable|max:150',
            'link2'=>'nullable|max:255',
        ]);
        SingleSection::insert([
            'lebel'=>$request->lebel,
            'section_id'=>$request->section_id,
            'title'=>$request->title,
            'short_description'=>$request->short_description,
            'btn1'=>$request->btn1,
            'link1'=>$request->link1,
            'link2'=>$request->link2,
            'btn2'=>$request->btn2,
            'created_at'=>Carbon::now(),
        ]);
        return back()->with('success','Added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function published()
    {
       try
        {
            $SingleSection = SingleSection::where('section_id',1)->first();
            $data = ['data'=> $SingleSection];
            // return  $data;
            $content = View::make('fontend.section.homePageSection.s1Left.s1LeftTemplate',$data)->render();

            // Path to the new static Blade view file
            $path = resource_path('views/fontend/section/homePageSection/s1Left/s1Left.blade.php');

            // Write the rendered content to the Blade view file
            file_put_contents($path, $content);
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
        $validatedData = $request->validate([
            'lebel'=>'required|max:40',
            'title'=>'required|max:150',
            'short_description'=>'required|max:600',
            'btn1'=>'nullable|max:150',
            'link1'=>'nullable|max:255',
            'btn2'=>'nullable|max:150',
            'link2'=>'nullable|max:255',
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

}
