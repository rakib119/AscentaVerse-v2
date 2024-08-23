<?php

namespace App\Http\Controllers\DashboardControllers;

use App\Http\Controllers\Controller;
use App\Models\BlogCategories;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BlogCategoryController extends Controller
{

    public function __construct()
    {
        // $this->middleware('auth');
        // $this->middleware('admin');
    }

    public function index()
    {
        return  view('dashboard.system.blogCategories.index',[
            'categories'=> BlogCategories::all()
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
        ], [],
        [
            'name'=>'Category Name',
        ]);
        BlogCategories::insert([
            'name'=>$request->name,
            'created_by'=>auth()->id(),
            'created_at'=> Carbon::now()
        ]);
        return redirect('blog-category')->with('success','Added successfully');
    }


    public function edit($enId)
    {
        $id = decrypt($enId);
        $category = BlogCategories::findOrFail($id);
        return view('dashboard.system.blogCategories.edit',compact('category'));
    }

    public function update(Request $request, $id)
    {
        $category = BlogCategories::findOrFail($id);
        $request->validate([
            'name'=>'required',
        ], [],
        [
            'name'=>'Category Name',
        ]);
        $category->name = $request->name;
        $category->updated_by = auth()->id();
        $category->save();

        return redirect('blog-category')->with('success','Updated successfully');
    }

}

