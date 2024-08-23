<?php

namespace App\Http\Controllers\DashboardControllers\home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\faq;
use App\Models\SingleSection;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\View;

class FaqController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        // $this->middleware('admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return  view('dashboard.pages.home.faq.index',[
            'faqs'=> Faq::all(),
            'data'=> SingleSection::where('section_id',7)->first()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.pages.home.faq.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'question'=>'required|max:255',
            'answear'=>'required|max:800'
        ]);
        faq::insert([
            'question'=>$request->question,
            'answear'=>$request->answear,
            'created_by'=>auth()->id(),
            'created_at'=> Carbon::now()
        ]);
        return redirect('faq')->with('success','Faq added successfully');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\faq  $faq
     * @return \Illuminate\Http\Response
     */
    public function edit(faq $faq)
    {
        return view('dashboard.pages.home.faq.edit',compact('faq'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\faq  $faq
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, faq $faq)
    {
        $request->validate([
            'question'=>'required',
            'answear'=>'required'
        ]);
        $faq->question = $request->question;
        $faq->answear = $request->answear;
        $faq->updated_by = auth()->id();
        $faq->save();

        return redirect('faq')->with('success','Updated successfully');
    }
    public function title_store(Request $request)
    {
        $request->validate([
            'lebel'=>'required|max:40',
            'title'=>'required|max:150'
        ]);

        try
        {
            SingleSection::insert([
                'lebel'=>$request->lebel,
                'section_id'=>7,
                'title'=>$request->title,
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
    public function title_update(Request $request, faq $id)
    {
        $validatedData = $request->validate([
            'lebel'=>'required|max:40',
            'title'=>'required|max:150',
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\faq  $faq
     * @return \Illuminate\Http\Response
     */
    public function destroy(faq $faq)
    {
        $faq->delete();
        return back()->with('success','Deleted successfully');
    }

    public function published()
    {
       try
        {
            $SingleSection = SingleSection::where('section_id',7)->first();
            $faqs = faq::all();
            $data = ['data'=> $SingleSection,'faqs'=> $faqs];
            // return  $data;
            $content = View::make('fontend.section.homePageSection.s7Faq.faqTemplate',$data)->render();

            // Path to the new static Blade view file
            $path = resource_path('views/fontend/section/homePageSection/s7Faq/faq.blade.php');

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
}
