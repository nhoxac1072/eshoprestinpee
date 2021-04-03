<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\support\Facades\Redirect; //trả về 1 trang
use Illuminate\Support\Facades\Session;
use Illuminate\Http\UploadedFile;
session_start();


class showproductcontroller extends Controller
{
    //
    function add_product()
    {
        $cate =DB::table('product')->orderBy('id','desc')->get();
        $brand = DB::table('dongsp')->orderBy('id','desc')->get();

        return view('admin.addshowproduct')->with('cateid',$cate)->with('brandid',$brand);
    }

    //
    function all_show_product()
    {
    //    $allproduct = DB::table('showproduct')->join('product', 'product.id','=','showproduct.cateid')
    //    ->join('dongsp', 'dongsp.id','=','showproduct.brandid')
    //    ->orderBy('showproduct.cateid','desc')->get();

        $allproduct = DB::table('showproduct')->orderBy('id','desc')->get();
        $QLSP= view('admin.allshowproduct')->with('allproduct',$allproduct);

       return view('admin_layout')->with('admin.allshowproduct',$QLSP);

    }

    //
    public function save_product(Request $request)
    {
        $data = array();

        $getnameimg =
        $data['cateid'] = $request->cate; // là tên trong form chỗ tên dnah muc
        $data['brandid'] = $request->brand;
        $data['namesp'] =$request->name_sp;
        $data['desc'] = $request->product_desc;
        $data['content'] = $request->content;
        $data['price'] = $request->price;
        $data['status'] = $request->product_status;
        $data['image'] =$request->image;
        //$get_image = $request->file('image');

        
        $data['image']=$request->file('image')->getClientOriginalName(); // lấy ra tên ảnh
        $imgextention=$request->file('image')->extension();
        $file=$request->file('image');
        $file->move('hinhanh/product',$data['image']); // trỏ vào mục hình

        
        DB::table('showproduct')->insert($data);  // hàm thêm
        Session::put('message','them sản phẩm thành công'); 
        return \Redirect::to('all-show-product');
    }

    // function unactive_brand_product($brand_product_id) 
    // {

    //     DB::table('dongsp')->where('id',$brand_product_id)->update(['status_dongSP'=>1]);
    //     Session::put('message','thay đổi trạng thái mục sang hiện thành công');
    //     return \Redirect::to('allbrand');
    // }

    //     // -------------------------------------

    // function active_brand_product($brand_product_id)
    // {
    //     DB::table('dongsp')->where('id',$brand_product_id)->update(['status_dongSP'=>0]);
    //     Session::put('message','thay đổi trạng thái mục sang ẩn thành công');
    //     return \Redirect::to('allbrand');
    // }
    
    function edit_showproduct($product_id) 
    {
        $cate_product = DB::table('product')->orderBy('id','desc')->get();
        $brand_product = DB::table('dongsp')->orderBy('id','desc')->get();
        $edit_product= DB::table('showproduct')->where('id',$product_id)->get(); //first laasy ra muc duy nhat or dau tien tim thay... get  thì mặc định có id r  nên lấy thôi

        
        $QLSP= view('admin.editshowproduct')->with('editproduct',$edit_product) // with(cái này hình như là cái gọi $ bên giao diện hiển thị all,biến đã tạo bên trên)
        ->with('cateid',$cate_product)->With('brandid',$brand_product);

        return view('admin_layout')->with('admin.editshowproduct',$QLSP);
    }

    public function update_product($product_id,Request $request)  
    {
        # code...
        $data = array();
        
        $data['cateid'] = $request->cate; // là tên trong form chỗ tên dnah muc
        $data['brandid'] = $request->brand;
        $data['namesp'] =$request->name_sp;
        $data['desc'] = $request->product_desc;
        $data['content'] = $request->content;
        $data['price'] = $request->price;
        $data['status'] = $request->product_status;
        // $data['image'] =$request->image;

        if($request->file('image')!=null)
        {
            $data['image']=$request->file('image')->getClientOriginalName(); // lấy ra tên ảnh
            $imgextention=$request->file('image')->extension();
            $file=$request->file('image');

            $file->move('hinhanh/product',$data['image']);
        }

        DB::table('showproduct')->where('id',$product_id)->update($data);  // hàm thêm
        Session::put('message','them sản phẩm thành công'); 
        return \Redirect::to('all-show-product');
    }
    //xóa
    public function delete_product($product_id)
    {
        DB::table('showproduct')->where('id',$product_id)->delete(); // where(id trong table, biến khởi tạo trên funcion)
        Session::put('message','xóa sản phẩm thành công');
        return \Redirect::to('all-show-product');
    }
}
