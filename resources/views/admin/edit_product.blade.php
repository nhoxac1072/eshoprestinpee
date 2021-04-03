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
                        <?php
                            $message =Session::Get('message');	
                            if($message)
                                echo $message;
                                Session::put('message', null);
                            ?>
                        <div class="panel-body">
                        @foreach($edit_product as $key => $value)
                            {{csrf_field()}}
                            <div class="position-center">
                                <form role="form" action="{{URL::to('/updates-product/'.$value->id)}}" method="post">
                                    {{csrf_field()}}
                                    
                                <div class="form-group">
                                    <label for="exampleInputEmail1">tên danh mục</label>
                                    <input type="text" name="product_name" value="{{$value->name}}" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">mổ tả</label>
                                    <Textarea style="size: none" rows="5" class="form-control" id="exampleInputPassword1" name="product_desc" placeholder="mô tả">
                                        {{$value->desc}}
                                    </Textarea>
                                </div>                               
                                <button type="submit" name="update-catory-product" class="btn btn-info">Submit</button>
                            </form>
                            </div>
                        @endforeach
                        </div>
                    </section>
            </div>
        </div>
@endsection