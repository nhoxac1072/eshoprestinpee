<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request; //
use Illuminate\Support\Facades\Session;
use Illuminate\support\Facades\Redirect; //trả về 1 trang
session_start();

class admincontroller extends Controller
{
    //
    public function authlogin()
    {
        $admin_id=Session::get('id');
        if($admin_id)
        {
            \Redirect::to('admin.dashboard');
        }
        else
        {
            \Redirect::to('admin')->send();
        }
    }
    public function index()
    {
        return view('admin_login');
    }
 
    public function showdashboard()
    {
        // $this->authlogin(); // hàm dùng để bảo mật khi chưa đnăg nhập k cho vào trang khác login
        return view('admin.dashboard');
    }

    public function dashboard(Request $request)
    {
        $email=$request->email; 
        $password= $request->password;
        $Result = DB::table('admin')->where('email',$email)->Where('password',$password)->first(); //trả về bản ghi đầu tiên
        if($Result)
        {
            Session::put('name',$Result->name); 

            Session::put('id',$Result->id);
            return \Redirect::to('/dashboard');
        }
        else
        {
            Session::put('message','sai tum lum nhap lai di');
            return \Redirect::to('/admin');
        }
        // return view('admin.dashboard');
    }

    public function logout(request $request)
    {
        Session::put('name',null); 
        Session::put('id',null);
        return view('/admin_login');
    }
}
