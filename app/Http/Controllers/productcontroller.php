<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\support\Facades\Redirect; //trả về 1 trang
use Illuminate\Support\Facades\Session;
session_start();

class productcontroller extends Controller
{
    //

    function addproduct()
    {
        return view('admin.addproduct');
    }

    //
    function allproduct()
    {
       $allproduct= DB::table('product')->get();
       $QLSP= view('admin.allproduct')->with('product',$allproduct);
       return view('admin_layout')->with('admin.allproduct',$QLSP);
        // return response()->json($allproduct);

    }
    //
    function save_product(Request $request)
    {
        $data = array();

        $data['name'] = $request->addproduct; // là tên trong form chỗ tên dnah muc
        $data['desc'] = $request->addproduct_desc;
        $data['status'] = $request->product_status;

        DB::table('product')->insert($data);
        Session::put('message','them danh mục thành công');
        return \Redirect::to('allproduct');
    }

    function unactive_product($product_id) 
    {

        DB::table('product')->where('id',$product_id)->update(['status'=>1]);
        Session::put('message','thay đổi trạng thái mục sang hiện thành công');
        return \Redirect::to('allproduct');
    }
    function active_product($product_id)
    {
        DB::table('product')->where('id',$product_id)->update(['status'=>0]);
        Session::put('message','thay đổi trạng thái mục sang ẩn thành công');
        return \Redirect::to('allproduct');
    }
    function edit_product($product_id)
    {
        $editproduct= DB::table('product')->where('id',$product_id)->get(); //first laasy ra muc duy nhat or dau tien tim thay... get  thì mặc định có id r  nên lấy thôi

        $QLSP= view('admin.edit_product')->with('edit_product',$editproduct); // with(??,biến đã tạo bên trên)
        return view('admin_layout')->with('admin.edit_product',$QLSP);
    }

    public function update_product($product_id,Request $request)  
    {
        # code...
        $data = array();
        $data['name'] = $request->product_name; // là tên trong form chỗ tên dnah muc
        $data['desc'] = $request->product_desc;

        DB::table('product')->where('id',$product_id)->update($data); // where(id trong table, biến khởi tạo trên funcion)
        Session::put('message','cập nhật danh muc mục sản phẩm thành công');
        return \Redirect::to('allproduct');
    }
    //xóa
    public function delete_product($product_id)
    {
        DB::table('product')->where('id',$product_id)->delete(); // where(id trong table, biến khởi tạo trên funcion)
        Session::put('message','xóa sản phẩm thành công');
        return \Redirect::to('allproduct');
    }
}
