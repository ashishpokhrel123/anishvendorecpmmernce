<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Str;
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $parent_cats=Category::where('is_parent',1)->orderBy('category_name','ASC')->get();
        return view('admin.category',compact('parent_cats'));
    }
    public function insert(Request $request)
    {
        
        // $category_name = $request->category_name;
        // $category_slug=$request->category_slug;
        // $description=$request->description;
        // $image=$request->file('file');
        // $imageName=time().'.'.$image->extension();
        // $image->move(public_path('images'),$imageName);
        // $category= new Category();
        // $category->category_name=$category_name;
        // $category->category_slug=$category_slug;
        // $category->description=$description;
        // $category->image=$imageName;
        
        // $category->save();
        $this->validate($request,[
            'category_name'=>'string|required',
            'is_parent'=>'sometimes|in:1',
            'description'=>'string|nullable',
            'status'=>'required|in:active,inactive',
            'parent_id'=>'nullable'
        ]);
        $data=$request->all();
        $slug=Str::slug($request->input('category_name'));
        $slug_count=Category::where('category_slug',$slug)->count();
        if($slug_count>0)
        {
            $slug=time(). '-'.$slug;
        }
        $data['category_slug']=$slug;
        $status=Category::create($data);
        if($status)
        {
            return back()->with('category-added','record has been inserted');
        }
        else
        {
            return back()->with('error','Something went wrong');
        }
        
    }
    public function getChildParentID(Request $request,$id)
    {
       
        $category=Category::find($request->id);
        if($category)
        {
            $child_id=Category::getChildParentID($request->id);
        if(count($child_id)<=0)
        {
            return response()->json(['status'=>false,'data'=>null,'msg'=>'']);
        }
        return response()->json(['status'=>true,'data'=>$child_id,'msg'=>'']);

        }
        else
        {
            return response()->json(['status'=>false,'data'=>null,'msg'=>'Category not found']);
        }
        
        
    }
    public function showCategory()
    {
        $parent_cats=Category::where('is_parent',1)->orderBy('category_name','ASC')->get();
        $category=Category::all();
        return view('admin/category',compact('category','parent_cats'));
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
