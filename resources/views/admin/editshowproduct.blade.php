<?php
use Illuminate\Support\Facades\Session;
?>

@extends('admin_layout')
@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                           cập nhật sản phẩm
                        </header>
                        <div class="panel-body">
                        <?php
                            $message =Session::Get('message');	
                            if($message)
                                echo $message;
                                Session::put('message', null);
                            ?>
                            <div class="position-center">
                            @foreach($editproduct as $key => $value)
                            {{csrf_field()}}
                                <form role="form" action="{{URL::to('update-showproduct/'.$value->id)}}" method="post" enctype="multipart/form-data">
                                    {{csrf_field()}}
                                    
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">tên sản phẩm</label>
                                        <input type="text" name="name_sp" value="{{$value->namesp}}" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">gias</label>
                                        <input type="text" name="price" value="{{$value->price}}" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">hình ảnh</label>
                                        <input type="file" name="image" class="form-control" id="exampleInputEmail1" 
                                            accept="image/x-png,image/gif,image/jpeg,image/jpg,image/png">
                                        <img src="{{URL::to('hinhanh/product/'.$value->image)}} "width="150" height="180"/>
                                        
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">mô tả sp</label>
                                        <Textarea style="size: none" rows="5" class="form-control" id="exampleInputPassword1" name="product_desc" placeholder="mô tả">
                                            {{$value->desc}}
                                        </Textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">nội dung sp</label>
                                        <Textarea style="size: none" rows="5" class="form-control" id="exampleInputPassword1" name="content" >
                                            {{$value->content}}
                                        </Textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>  loại sản phẩm </label> 
                                            <Select class="from-control" name="cate" value="0">
                                            @foreach ($cateid as $key =>$pro)   <!--$cateid là id của bảng product -->
                                            @if($pro->id ==$value->cateid)
                                            {
                                                <option selected value="{{$pro->id}}">{{$pro->name}}</option>}
                                            @else
                                                <option value="{{$pro->id}}">{{$pro->name}}</option>
                                            @endif
                                            @endforeach
                                            </Select>
                                    </div>
                                    <div class="form-group">
                                        <label>  thương hiệu </label>
                                            <Select class="from-control" name="brand" value="0">
                                            @foreach ($brandid as $key =>$brand)   <!--$brandid là id của bảng dongsp -->
                                            @if($brand->id ==$value->brandid)
                                                <option selected value="{{$brand->id}}">{{$brand->name_dongSP}}</option>
                                            @else
                                                <option value="{{$brand->id}}">{{$brand->name_dongSP}}</option>
                                            @endif
                                            @endforeach
                                            </Select>
                                    </div>
                                    <div class="form-group">
                                        <label>  hiển thị </label>
                                            <Select class="from-control" name="product_status" value="1">
                                                <option value="1">hiển</option>
                                                <option value="0">ẩn</option>
                                            </Select>
                                    </div>
                                    <button type="submit" name="add-catory-product" class="btn btn-info">Submit</button>
                                </form>
                                @endforeach
                            </div>

                        </div>
                    </section>
            </div>
        </div>
@endsection