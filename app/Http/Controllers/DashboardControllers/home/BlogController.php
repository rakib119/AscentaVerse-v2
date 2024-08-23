<?php

namespace App\Http\Controllers\DashboardControllers\home;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogCategories;
use App\Models\SingleSection;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\View;

class BlogController extends Controller
{

    public function index()
    {
        $SingleSection = SingleSection::where('section_id',9)->first();
        $blogs = Blog::where('section_id',9)->get();
        $cat = BlogCategories::select('id','name')->where('status_active',1)->get();
        foreach ($cat as $v)
        {
            $categories [$v->id] = $v->name;
        }
        $data = ['data'=> $SingleSection,'blogs'=> $blogs,'categories'=> $categories];
        return view('dashboard.pages.home.blog.index',$data);
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
                'section_id'=>9,
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

    public function title_update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'lebel'=>'required|max:40',
            'title'=>'required|max:150'
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
            'title'=>'required|max:50|unique:blogs,title',
            'thumbnail'=>'required|image|mimes:jpg,jpeg|dimensions:width=365,height=255',
            'button_name'=>'required|max:25',
            'category'=>'required',
            'short_description'=>'required|max:350',
        ]);
        try
        {
            $msg_str = uploadImage('public/assets/images/blogs/',$request,'thumbnail'); //Custom Helpers
            $msgArr = explode('*',$msg_str);
            if($msgArr[0] == 1){
                $is_displayed = '0' ;
                if(isset($request->is_displayed_in_home))  $is_displayed='1';
                Blog::insert([
                    'section_id'=>9,
                    'category_id'=> $request->category,
                    'title'=>$request->title,
                    'slug'=> Str::slug($request->title),
                    'thumbnail'=>$msgArr[1],
                    'button_name'=>$request->button_name,
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
    public function edit(Request $request, string $enId)
    {
        $id = decrypt($enId);
        $blog = Blog::where('section_id',9)->findOrFail($id);
        $categories = BlogCategories::select('id','name')->where('status_active',1)->get();
        $data = ['blog'=> $blog, 'categories'=> $categories];
        return view('dashboard.pages.home.blog.edit',$data);
    }

    public function update(Request $request, string $id)
    {
        // return $request;
        $request->validate([
            'title'=>'required|max:50|unique:blogs,title,'.$id.',id',
            'thumbnail'=>'nullable|image|mimes:jpg,jpeg|dimensions:width=270,height=303',
            'button_name'=>'required|max:25',
            'category'=>'required',
            'short_description'=>'required|max:350',
        ]);
        try
        {
            $service = Blog::findOrFail($id);
            $msg_str = uploadImage('public/assets/images/blogs/',$request,'thumbnail'); //Custom Helpers
            $msgArr = explode('*',$msg_str);
            if($msgArr[0] == 1){


                if ($msgArr[1]!= 0) //IF uploaded image found
                {
                    $image_name = $msgArr[1];
                    $path = base_path('public/assets/images/blogs/' . $service->thumbnail);
                    $msg = insertDeleteLink($path,9); // Custom Function
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
                $service->category_id = $request->category;
                $service->slug = Str::slug($request->title) ;
                $service->is_displayed_in_home = $is_displayed;
                $service->short_description = $request->short_description;
                $service->updated_by = auth()->id();
                $service->save();

                return redirect()->route('blog.index')->with('success','Updated successfully');
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
            $blog = Blog::findOrFail($id);
            $file_location = base_path('public/assets/images/blogs/' .  $blog->thumbnail);

            $msg = insertDeleteLink($file_location,9); //Custom Helpers
            if ($msg!=1)
            {
                return back()->with('error',$msg);
            }
            $blog->delete();

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
            $blogs = Blog::where(['section_id'=>9])->get();
            $no_of_blog = $blogs->count();
            if ($no_of_blog<1 ) {
                return back()->with('error','Blogs not found');
            }
            $SingleSection = SingleSection::where('section_id',9)->first();
            $no_of_data = $SingleSection->count();
            if ($no_of_data<1 ) {
                return back()->with('error','Please enter Section data for published');
            }

            $all_data = ['blogs'=> $blogs,'data'=> $SingleSection];
            // return  $data;
            $content = View::make('fontend.section.homePageSection.blog.blog_template',$all_data)->render();
            $content2 = View::make('fontend.section.blog.blog-template',$all_data)->render();

            // Path to the new static Blade view file
            $path = resource_path('views/fontend/section/homePageSection/blog/blog.blade.php');
            $path2 = resource_path('views/fontend/section/blog/all_blogs.blade.php');

            // Write the rendered content to the Blade view file
            file_put_contents($path, $content);
            file_put_contents($path2, $content2);

            $msg = deleteFile(9); //Custom helpers
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
