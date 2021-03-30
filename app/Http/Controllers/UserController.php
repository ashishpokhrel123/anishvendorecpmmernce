<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;


class UserController extends Controller
{
    public function index(Request $request)
    {
        return view('user.register');
    }
    public function log()
    {
        return view('user.login');
    }
    public function register(Request $request)
    {
        $valid=Validator::make($request->all(),[
            "name"=>'required',
            "email"=>'required|email',
            "password"=>'required',
            "address"=>"required",
            "phone"=>"required",
            "zipcode"=>"required",
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
                "name"=>$request->name,
                "email"=>$request->email,
                "password"=>$request->password,
                "address"=>$request->address,
                "phone"=>$request->phone,
                "zipcode"=>$request->zipcode
            ];
            $query=DB::table('users')->insert($reg);
            if($query)
            {
                return response()->json([
                    'status'=>'success',
                    'msg'=>"Registration Success"
                ]);
            }
        }
    }

}
