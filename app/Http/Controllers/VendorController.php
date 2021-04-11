<?php

namespace App\Http\Controllers;

use App\Models\vendor;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Redirect;
use Illuminate\Support\Facades\Validator;
use Crypt;

class VendorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('vendorr.login');
    }
    public function adminvendor()
    {
        $result['data']=vendor::all();
        return view('admin/vendor',$result);
    }
    public function reg()
    {
        return view('vendorr.register');
    }
    public function dashboard()
    {
        
        return view('vendorr.vendordash');
    }
    public function products()
    {
        
        return view('vendorr.products');
    }
    public function status(Request $request,$id)
    {
        $data=vendor::find($id);
        if($data->status==0)
        {
            $data->status=1;
        }
        else{
            $data->status=0;
        }
        $data->save();
        return Redirect('admin/vendor')->with('message',$data->name. 'Status has been changed');
    }
    public function register(Request $request)
    {
        $valid=Validator::make($request->all(),[
            // "vendor_name"=>'required',
            "email"=>'required|email',
            "password"=>'required',
            "address"=>"required",
            "phone"=>"required",
            
        ]);
        if(!$valid->passes())
        {
            return response()->json([
                'status'=>'error',
                'error'=>$valid->errors()
            ]);
        }
        else
        {
            $reg=[
                "vendor_name"=>$request->vendor_name,
                "email"=>$request->email,
                "password"=>Crypt::encrypt($request->password),
                "location"=>$request->address,
                "phone"=>$request->phone,
                "status"=>$request->status ?? false,
            ];
            $query=vendor::select('vendors')->insert($reg);
            if($query)
            {
                return response()->json([
                    'status'=>'success',
                    'msg'=>"Registration Success"
                ]);
            }
        }
    }
    public function login(Request $request)
    {
       
            $result = DB::table('vendors')->where(['email'=>$request->email])->get();
       
            if(isset($result[0]))
            {
                $db_pwd=Crypt::decrypt($result[0]->password);
                if($db_pwd==$request->password)
                {
                    $request->session()->put('VENDOR_LOGIN',true);
                    $request->session()->put('VENDOR_ID',$result['0']->id);
                    return redirect('vendor/vendordash');
                }
                else
                {
                    $request->session()->flash('error','Please enter valid login credentials');
                    return redirect('vendor');
                }
                
    
            }
            else
            {
                $request->session()->flash('error','Please enter valid login credentials');
                    return redirect('vendor');
            }
        
       
        // return response()->json([
        //     'status'=>$status,
        //     'msg'=>$msg
        // ]);

    }
    
    public function logout()
    {
        session()->forget('VENDOR_LOGIN');
        session()->forget('VENDOR_ID');
        session()->flash('error','Logged Out');
        return redirect('vendor');
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
     * @param  \App\Models\vendor  $vendor
     * @return \Illuminate\Http\Response
     */
    public function show(vendor $vendor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\vendor  $vendor
     * @return \Illuminate\Http\Response
     */
    public function edit(vendor $vendor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\vendor  $vendor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, vendor $vendor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\vendor  $vendor
     * @return \Illuminate\Http\Response
     */
    public function destroy(vendor $vendor)
    {
        //
    }
}
