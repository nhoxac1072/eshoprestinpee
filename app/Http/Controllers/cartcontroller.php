<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use Session;
use DB;
use \Redirect;

class cartcontroller extends Controller
{
    function cartview()
    {
        return view('cart');
    }
    function storefromhome(Request $re)
    {
        
        $product_id=$re->product_id;
        $size=$re->get('size');
        if($size=='Size=?')
        {
            Session::put('mes','Have not choose size yet');
            return \Redirect::to('/');
        }
        else
        {
            $showproduct=DB::table('showproduct')->where('id',$product_id)->first();

            Cart::add(array('id' =>$product_id,
            'name' =>$showproduct->namesp,
            'qty' => 1,
            'price' =>(int)$showproduct->price,
            'weight' => 0,
            'options' => ['image' => $showproduct->image,'size' => $size]
             ));
            session()->flash('mes','Item added in cart');
            return \Redirect::to('/');
        }
    }
    function storefromsingle(Request $re)
    {
        
        $product_id=$re->product_id;
        $size=$re->get('size');
        if($size=='Size=?')
        {
            Session::put('mes','Have not choose size yet');
            return \Redirect()->route('productdetail', ['id' => $product_id]);
        }
        else
        {
            $showproduct=DB::table('showproduct')->where('id',$product_id)->first();

            Cart::add(array('id' =>$product_id,
            'name' =>$showproduct->namesp,
            'qty' => 1,
            'price' =>(int)$showproduct->price,
            'weight' => 0,
            'options' => ['image' => $showproduct->image,'size' => $size]
             ));
            session()->flash('mes','Item added in cart');
            return \Redirect()->route('productdetail', ['id' => $product_id]);
        }
    }
    function incqtycart($product_id)
    {
        $cart  = Cart::content();
        $rowId = $cart->where('id', $product_id)->first()->rowId;
        $row = Cart::get($rowId);
        Cart::update($rowId,$row->qty + 1);
        return \Redirect::to('/cart');
    }

    function decqtycart($product_id)
    {
        $cart  = Cart::content();
        $rowId = $cart->where('id', $product_id)->first()->rowId;
        $row = Cart::get($rowId);
        Cart::update($rowId, $row->qty - 1);
        return \Redirect::to('/cart');
    }

    function delcart($product_id)
    {
        $rows  = Cart::content();
        $rowId = $rows->where('id', $product_id)->first()->rowId;
        Cart::remove($rowId);
        return \Redirect::to('/cart');
    }
}
