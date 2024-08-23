<?php

namespace App\Http\Controllers\DashboardControllers\home;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use App\Models\SingleSection;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class TestimonialController extends Controller
{
    public function index()
    {
        $SingleSection = SingleSection::where('section_id',10)->first();
        $testimonials = Testimonial::where('section_id',10)->get();
        $data = ['data'=> $SingleSection,'testimonials'=> $testimonials];
        return view('dashboard.pages.home.testimonial.index',$data);
    }

    public function title_store(Request $request)
    {
        $request->validate([
            'lebel'=>'required|max:40',
            'title'=>'required|max:100',
            'short_description'=>'required|max:250'
        ]);

        try
        {
            SingleSection::insert([
                'lebel'=>$request->lebel,
                'section_id'=>10,
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
    public function title_update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'lebel'=>'required|max:40',
            'title'=>'required|max:100',
            'short_description'=>'required|max:250'
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

    public function store(Request $request)
    {

        $request->validate([
            'name'=>'required|max:50',
            'designation'=>'required|max:100',
            'photo'=>'required|image|mimes:jpg,jpeg|dimensions:width=119,height=119',
            'comment'=>'required|max:700',
            'rating'=>'required|integer|max:5|min:0',
        ]);

        try
        {
            $msg_str = uploadImage('public/assets/images/testimonials/',$request,'photo'); //Custom Helpers
            $msgArr = explode('*',$msg_str);
            if($msgArr[0] == 1){
                Testimonial::insert([
                    'section_id'=>10,
                    'name'=>$request->name,
                    'designation'=>$request->designation,
                    'rating'=>$request->rating,
                    'photo'=>$msgArr[1],
                    'comment'=>$request->comment,
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

    public function edit(Request $request, string $enId)
    {
        $id = decrypt($enId);
        $testimonial = Testimonial::where('section_id',10)->findOrFail($id);
        $data = ['testimonial'=> $testimonial];
        return view('dashboard.pages.home.testimonial.edit',$data);
    }

    public function update(Request $request, string $id)
    {
        // return $request;
        $request->validate([
            'name'=>'required|max:50',
            'designation'=>'required|max:100',
            'photo'=>'nullable|image|mimes:jpg,jpeg|dimensions:width=119,height=119',
            'comment'=>'required|max:700',
            'rating'=>'required|integer|max:5|min:0'
        ]);
        try
        {

            $testimonial = Testimonial::findOrFail($id);
            $msg_str = uploadImage('public/assets/images/testimonials/',$request,'photo'); //Custom Helpers
            $msgArr = explode('*',$msg_str);
            if($msgArr[0] == 1){


                if ($msgArr[1]!= 0) //IF uploaded image found
                {
                    $image_name = $msgArr[1];
                    $path = base_path('public/assets/images/testimonials/' . $testimonial->photo);
                    $msg = insertDeleteLink($path,10); // Custom Function
                    if ($msg!=1)
                    {
                        return back()->with('error',$msg);
                    }
                    $testimonial->photo = $image_name;
                }


                $testimonial->name = $request->name;
                $testimonial->designation = $request->designation;
                $testimonial->comment = $request->comment;
                $testimonial->updated_by = auth()->id();
                $testimonial->save();

                return redirect()->route('testimonial.index')->with('success','Updated successfully');
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
            $testimonial = Testimonial::findOrFail($id);
            $file_location = base_path('public/assets/images/testimonials/' .  $testimonial->photo);

            $msg = insertDeleteLink($file_location,10); //Custom Helpers
            if ($msg!=1)
            {
                return back()->with('error',$msg);
            }
            $testimonial->delete();

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
            $testimonials = Testimonial::where(['section_id'=>10])->get();

            $no_of_testimonials = $testimonials->count();
            if ($no_of_testimonials<1 ) {
                return back()->with('error','At least 1 testimonials needed for published');
            }

            $SingleSection = SingleSection::where('section_id',10)->first();
            $no_of_data = $SingleSection->count();
            if ($no_of_data<1 ) {
                return back()->with('error','Please enter data for published');
            }

            $all_data = ['testimonials'=> $testimonials,'data'=> $SingleSection];
            // return  $data;
            $content = View::make('fontend.section.homePageSection.testimonial.testimonialTemplate',$all_data)->render();

            // Path to the new static Blade view file
            $path = resource_path('views/fontend/section/homePageSection/testimonial/testimonial.blade.php');

            // Write the rendered content to the Blade view file
            file_put_contents($path, $content);

            $msg = deleteFile(10); //Custom helpers
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
