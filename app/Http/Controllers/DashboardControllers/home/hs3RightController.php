<?php

namespace App\Http\Controllers\DashboardControllers\home;

use App\Http\Controllers\Controller;
use App\Models\SingleSection;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class hs3RightController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $SingleSection = SingleSection::where('section_id',4)->first();
        $data = ['data'=> $SingleSection];
        return view('dashboard.pages.home.section3.right.index',$data);
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
        ]);

        try
        {
            SingleSection::insert([
                'lebel'=>$request->lebel,
                'section_id'=>4,
                'title'=>$request->title,
                'short_description'=>$request->short_description,
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

    /**
     * Display the specified resource.
     */
    public function published()
    {
       try
        {
            $SingleSection = SingleSection::where('section_id',4)->first();
            $data = ['data'=> $SingleSection];
            // return  $data;
            $content = View::make('fontend.section.homePageSection.s3Right.s3RightTemplate',$data)->render();

            // Path to the new static Blade view file
            $path = resource_path('views/fontend/section/homePageSection/s3Right/s3Right.blade.php');

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
            'short_description'=>'required|max:600'
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
