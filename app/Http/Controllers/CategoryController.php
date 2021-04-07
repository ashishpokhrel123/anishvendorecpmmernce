<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.category');
    }
    public function insert(Request $request)
    {
        
        $category_name = $request->category_name;
        $category_slug=$request->category_slug;
        $description=$request->description;
        $image=$request->file('file');
        $imageName=time().'.'.$image->extension();
        $image->move(public_path('images'),$imageName);
        $category= new Category();
        $category->category_name=$category_name;
        $category->category_slug=$category_slug;
        $category->description=$description;
        $category->image=$imageName;
        
        $category->save();
        return back()->with('category-added','record has been inserted');
    }
    public function showCategory()
    {
        $category=Category::all();
        return view('admin/category',compact('category'));
    }
    public function delCategory($id)
    {
        $category=Category::find($id);
        unlink(public_path('images').'/'.$category->image);
        $category->delete();
        return back()->with('category-deleted','category has been deleted');
    }
    public function editCategory($id)
    {
        $category=Category::find($id);
        return view('admin.edit-category',compact('category'));
    }
    public function updateCategory(Request $request)
    {
        $category_name = $request->category_name;
        $category_slug=$request->category_slug;
        $description=$request->description;
        $image=$request->file('file');
        $imageName=time().'.'.$image->extension();
        $image->move(public_path('images'),$imageName);
        $category= Category::find($request->id);
        $category->category_name=$category_name;
        $category->category_slug=$category_slug;
        $category->description=$description;
        $category->image=$imageName;
        $category->save();
        var_dump($category);
        return back()->with('category-updated','record has been updated');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //
    }
}
