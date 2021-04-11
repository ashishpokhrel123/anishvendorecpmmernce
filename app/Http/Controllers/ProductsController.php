<?php

namespace App\Http\Controllers;

use App\Models\Products;
use App\Models\Category;
use App\Models\vendor;
use Illuminate\Http\Request;
use App\Http\Requests\StoreProduct;
use Auth;
use Str;
use  DB;
use Illuminate\Support\Facades\Validator;

class ProductsController extends Controller
{
    private $vendor;
    protected $vendor_id;
    public function __construct(vendor $vendor)
    {
    //    $this->vendor_id = Products::select('id')->with('vendor')->(get();
    //    dd($this->vendor_id);


    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        dd(Auth::user -> id);
       $product = Products::with('category')->first();
       $category = Category::all();

        return view('vendorr.products',compact('category','product'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('vendor.products');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {       

        // dd(Products::with('vendor_id')->get());
        // $order=Products::geAllvendor($request->id);
        // dd($order);

        // $id = DB::table('vendors')->pluck('id')->get();
        // $id = array();
        // $id = DB::table('vendor')->insertGetId([
        //     'vendor_id' => $vendor_id
        // ]);

        // $vendor_id = auth()->user()->id;
        // dd($vendor_id);

        //  $data=  ();



        //  $data = Validator::make($request->all(),[
        //     'product_name'=>'string|required',
        //     'description'=>'string|required',
        //     'warranty'=>'nullable',
        //     'product_image'=>'sometimes',
        //     'stock'=>'nullable|numeric',
        //     'price'=>'nullable|numeric',
        //     'offer_price'=>'nullable|numeric',
        //     'discount_price'=>'nullable|numeric',
        //     'weight'=>'string|required',
        //     'size'=>'string|required',
        //     'colours'=>'string|required',
        //     'status'=>'sometimes',
        //     'date'=>'string|required',
        //     'category_id'=>'required|exists:categories,id',
        //     'child_cat_id'=>'nullable|exists:categories,id',
        //     'vendor_id'=>'sometimes|exists:vendor,id'
        // ])->validate();

        // if($data->fails())
        // {
        //     return response()->json(['errors' => $validator->errors()]);

        // }
        // dd($req
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        dd($request->all());

        // dd($vendor);
        $data = array();
        dd($data);
        $data['id'] = $vendor->id;
        dd($data['id']);
        $slug=Str::slug($request->input('product_name'));
        $slug_count=Products::where('product_slug',$slug)->count();
        if($slug_count>0)
        {
            $slug=time(). '-'.$slug;
        }
        $data['produuct_slug']=$slug;
        $data['offer_price']=($request->price-(($request->price*$request->discount_price)/100));
        $status=Products::create($data);
        
        if($status)
        {
            return back()->with('product-added','record has been inserted');
        }
        else
        {
            return back()->with('error','Something went wrong');
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function show(Products $products)
    {
        $product=Products::all();
        return view('vendorr.show-products',compact('product'));
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
