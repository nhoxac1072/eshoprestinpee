<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\support\Facades\Redirect;
use Illuminate\Http\Request;

class checkoutcontroller extends Controller
{
    public function checkout(Request $re)
    {
        if($re->proceed!=null)
        {
            return view('checkout');
        }
        else
        {
            return \Redirect::to('/cart');
        }
    }
}
