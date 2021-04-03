<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\support\Facades\Mail;
use App\Mail\BillOrderMail;
use Illuminate\support\Facades\Redirect;
use Cart;
use DB;
use Carbon\Carbon;

class billController extends Controller
{
    public function ordermail(Request $request)
    {
        if(Cart::initial()!=0)
        {
        $ngaylap = Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d H:i:s');

        $hoadon = array();
        $hoadon['tenKH'] = $request->name;
        $hoadon['address'] = $request->address;
        $hoadon['city'] = $request->city;
        $hoadon['email'] = $request->email;
        $hoadon['phone'] = $request->phone;
        $hoadon['total'] = Cart::initial(0,'.','.');
        $hoadon['ngaylap'] = $ngaylap;
        DB::table('hoadon')->insert($hoadon);

        $hd= DB::table('hoadon')->where('ngaylap',$ngaylap)->first();

        foreach (Cart::content() as $item)
        {
            $cthoadon = array();
            $cthoadon['id_hd'] = $hd->idHD;
            $cthoadon['id_sp'] = $item->id;
            $cthoadon['qty_sp'] = $item->qty;
            $cthoadon['size'] = ($item->options->has('size') ? $item->options->size : '');
            $cthoadon['subtotal_sp'] = $item->subtotal;
            DB::table('cthoadon')->insert($cthoadon);
        }
        \Mail::to($request->email)->send(new BillOrderMail($request));
        Cart::destroy();
        return view('ty4buying');
        }
        else
        {
            return \Redirect::to('/');
        }
    }
}
