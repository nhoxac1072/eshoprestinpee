<?php
use Illuminate\Support\Facades\Session;
?>

@extends('admin_layout')
@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                           thêm dongf sarn pham
                        </header>
                        <div class="panel-body">
                        <?php
                            $message =Session::Get('message');	
                            if($message)
                                echo $message;
                                Session::put('message', null);
                            ?>
                            <div class="position-center">
                                <form role="form" action="{{URL::to('/save-brand-product')}}" method="post">

                                    {{csrf_field()}}
                                    
                                <div class="form-group">
                                    <label for="exampleInputEmail1">tên thương hiệu</label>
                                    <input type="text" name="dongsp" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">mổ tả</label>
                                    <Textarea style="size: none" rows="5" class="form-control" id="exampleInputPassword1" name="dongsp_desc" placeholder="mô tả">

                                    </Textarea>
                                </div>
                                <div class="form-group">
                                    <label>  hiển thị </label>
                                        <Select class="from-control" name="brand_status" value="0">
                                            <option value="0">ẩn</option>
                                            <option value="1">hiển thị</option>
                                        </Select>
                                </div>
                                <button type="submit" name="add-catory-product" class="btn btn-info">Submit</button>
                            </form>
                            </div>

                        </div>
                    </section>
            </div>
        </div>
@endsection