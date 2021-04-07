<?php

namespace App\Http\Controllers;

use App\Models\Products;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $category = Products::with('category')->first();
        return view('vendorr.products',compact('category'));
    }

    public function insertProduct(Request $request)
    {
       $category=Category::all();
        $category_id = Products::with('category')->first();
        $vendor_id=Products::with('vendor')->first();
        $product_name=$request->product_name;
        $product_slug=$request->product_slug;
        $description=$request->description;
        $warranty=$request->warranty;
        $product_image=$request->file('image');
        $imageName=time().'.'.$product_image->Extension();
        $product_image->move(public_path('images'),$imageName);
        $stock=$request->stock;
        $price=$request->price;
        $offer_price=$request->offer_price;
        $discount_price=$request->discount_price;
        $weight=$request->weight;
        $size=$request->size;
        $colours=$request->colours;
        $status=$request->status;
        $date=$request->date;
        $category_id=$request->category_id;
        $vendor_id=$vendor_id->id;
        $product = new Products();
        $product->product_name=$product_name;
        $product->product_slug=$product_slug;
        $product->description=$description;
        $product->warranty=$warranty;
        $product->product_image=$imageName;
        $product->stock=$stock;
        $product->price=$price;
        $product->offer_price=$offer_price;
        $product->discount_price=$discount_price;
        $product->weight=$weight;
        $product->size=$size;
        $product->colours=$colours;
        $product->status=$status;
        $product->date=$date;
        $product->category_id=$category_id;

        $product->vendor_id=$vendor_id;
        $product->save();
        return view('vendorr.products',compact('category'));
        return back()->with('product_added','product has been added');
    }
    public function showProducts()
    {
        $product=Products::all();
        return view('vendorr.show-products',compact('product'));
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
     * @param  \App\Models\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function show(Products $products)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function edit(Products $products)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Products $products)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function destroy(Products $products)
    {
        //
    }
}
