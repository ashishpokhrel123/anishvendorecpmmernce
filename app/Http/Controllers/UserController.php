<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Crypt;


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
    public function dashboard()
    {
        return view('user.userdash');
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
                "password"=>Crypt::encrypt($request->password),
                "address"=>$request->address,
                "phone"=>$request->phone,
                "zipcode"=>$request->zipcode
            ];
            $query=User::select('users')->insert($reg);
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
        $result = DB::table('users')->where(['email'=>$request->email])->get();
        if(isset($result[0]))
        {
            $db_pwd=Crypt::decrypt($result[0]->password);
            if($db_pwd==$request->password)
            {
                $request->session()->put('USER_LOGIN',true);
                $request->session()->put('USER_ID',$result['0']->id);
                return redirect('user/userdash');
            }
            else
            {
                $request->session()->flash('error','Please enter valid login credentials');
                return redirect('user');
            }
        }
        else
        {
            $request->session()->flash('error','Please enter valid login credentials');
                return redirect('user');
        }
        // return response()->json([
        //     'status'=>$status,
        //     'msg'=>$msg
        // ]);

    }
    public function logout()
    {
        session()->forget('USER_LOGIN');
        session()->forget('USER_ID');
        session()->flash('error','Logged Out');
        return redirect('user');
    }

}
