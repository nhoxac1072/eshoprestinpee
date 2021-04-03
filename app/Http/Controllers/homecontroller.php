<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use DB;

class homecontroller extends Controller
{
    public function index()
    {
        $showproduct = DB::table('showproduct')->where('status',1)->paginate(4);;
        $product = DB::table('product')->get();
        $dongsp = DB::table('dongsp')->get();
        $sizeS = DB::table('sizes')->get();
        if($showproduct!= null)
        {
            return view('home',compact('showproduct','dongsp','product','sizeS'));
        }
    }
    public function cateindex($cateid)
    {
        $showproduct = DB::table('showproduct')->where('status',1)->where('cateid',$cateid)->paginate(4);;
        $product = DB::table('product')->get();
        $dongsp = DB::table('dongsp')->get();
        $sizeS = DB::table('sizes')->get();
        if($showproduct!= null)
        {
            return view('home',compact('showproduct','dongsp','product','sizeS'));
        }
    }
    public function brandindex($brandid)
    {
        $showproduct = DB::table('showproduct')->where('status',1)->where('brandid',$brandid)->paginate(4);;
        $product = DB::table('product')->get();
        $dongsp = DB::table('dongsp')->get();
        $sizeS = DB::table('sizes')->get();
        if($showproduct!= null)
        {
            return view('home',compact('showproduct','dongsp','product','sizeS'));
        }
    }
    public function detailsp($product_id)
    {
        $showproduct = DB::table('showproduct')->where('id',$product_id)->first();

        $catename=DB::table('product')->where('id',$showproduct->cateid)->first();

        $brandname=DB::table('dongsp')->where('id',$showproduct->brandid)->first();

        $sizeS = DB::table('sizes')->get();
        $product = DB::table('product')->get();
        $dongsp = DB::table('dongsp')->get();
        return view('single_item',compact('dongsp','product','showproduct','catename','brandname','sizeS'));
    }
}
