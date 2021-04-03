<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\support\Facades\Redirect; //trả về 1 trang
use Illuminate\Support\Facades\Session;
session_start();


class dongSPcontroller extends Controller
{
    //
    function add_brand_product()
    {
        return view("admin.add_dongSP");
    }

    //
    function all_brand_product()
    {
       $all_brand_product= DB::table('dongsp')->get();
       $QLSP= view('admin.all_dongSP')->with('dongsp',$all_brand_product);
       return view('admin_layout')->with('admin.all_dongSP',$QLSP);

    }

    //
    function save_brand_product(Request $request)
    {
        $data = array();

        $data['name_dongSP'] = $request->dongsp; // là tên trong form chỗ tên dnah muc
        $data['desc_dongSP'] = $request->dongsp_desc;
        $data['status_dongSP'] = $request->brand_status;

        DB::table('dongsp')->insert($data);  // hàm thêm
        Session::put('message','them danh mục thành công'); 
        return \Redirect::to('allbrand');
    }

    function unactive_brand_product($brand_product_id) 
    {

        DB::table('dongsp')->where('id',$brand_product_id)->update(['status_dongSP'=>1]);
        Session::put('message','thay đổi trạng thái mục sang hiện thành công');
        return \Redirect::to('allbrand');
    }

        // -------------------------------------

    function active_brand_product($brand_product_id)
    {
        DB::table('dongsp')->where('id',$brand_product_id)->update(['status_dongSP'=>0]);
        Session::put('message','thay đổi trạng thái mục sang ẩn thành công');
        return \Redirect::to('allbrand');
    }
    
    function edit_brand_product($product_id) // lười sửa
    {
        $edit_brandproduct= DB::table('dongsp')->where('id',$product_id)->get(); //first laasy ra muc duy nhat or dau tien tim thay... get  thì mặc định có id r  nên lấy thôi

        $QLSP= view('admin.edit_brand')->with('edit_brand',$edit_brandproduct); // with(??,biến đã tạo bên trên)
        return view('admin_layout')->with('admin.edit_brand',$QLSP);
    }

    public function update_brand_product($product_id,Request $request)  
    {
        # code...
        $data = array();
        $data['name_dongSP'] = $request->brand_name; // là tên trong form chỗ tên dnah muc
        $data['desc_dongSP'] = $request->brand_desc;

        DB::table('dongsp')->where('id',$product_id)->update($data); // where(id trong table, biến khởi tạo trên funcion)
        Session::put('message','cập nhật danh muc mục sản phẩm thành công');
        return \Redirect::to('allbrand');
    }
    //xóa
    public function delete_brand_product($product_id)
    {
        DB::table('dongsp')->where('id',$product_id)->delete(); // where(id trong table, biến khởi tạo trên funcion)
        Session::put('message','xóa sản phẩm thành công');
        return \Redirect::to('allbrand');
    }
}
