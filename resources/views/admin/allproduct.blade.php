<?php
use Illuminate\Support\Facades\Session;
?>
@extends('admin_layout')
@section('content');

<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Responsive Table
    </div>
    <div class="row w3-res-tb">
      <div class="col-sm-5 m-b-xs">
        <select class="input-sm form-control w-sm inline v-middle">
          <option value="0">Bulk action</option>
          <option value="1">Delete selected</option>
          <option value="2">Bulk edit</option>
          <option value="3">Export</option>
        </select>
        <button class="btn btn-sm btn-default">Apply</button>                
      </div>
      <div class="col-sm-4">
      </div>
      <div class="col-sm-3">
        <div class="input-group">
          <input type="text" class="input-sm form-control" placeholder="Search">
          <span class="input-group-btn">
            <button class="btn btn-sm btn-default" type="button">Go!</button>
          </span>
        </div>
      </div>
    </div>
    <div class="table-responsive">
    <?php
      $message =Session::Get('message');	
      if($message)
          echo $message;
          Session::put('message', null);
      ?>
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th style="width:20px;">
              <label class="i-checks m-b-none">
                
              </label>
            </th>
            <th>tên danh mục</th>
            <th>description</th>
            <th>status</th>
            <th style="width:30px;">CRUP</th>
          </tr>
        </thead>
        <tbody>
        @foreach($product as $key => $value)

          <tr>
            <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"> <i></i></label></td>
            <td>{{$value->name}}</td>
            <td><span class="text-ellipsis">{{$value->desc}}</span></td>
            <td><span class="text-ellipsis">
              <?php
                if($value->status == 0)
                {?>
                  <A href="{{URL::to('/unactiveproduct/'.$value->id)}}">ẩn</A>
                  <?php
                }else
                {?>
                  <A href="{{URL::to('/active-product/'.$value->id)}}">hiện</A>
                  <?php
                } 
              ?>
            </span></td>
            <td>
              <a href="{{URL::to('/edit-product/'.$value->id)}}" class="active" ui-toggle-class="">
              <i class="fa fa-check text-success text-active"  ></i></a>

              <a href="{{URL::to('/delete-product/'.$value->id)}}" onclick="return confirm('Are you sure want to delete this product')" class="active" ui-toggle-class="">
              <i class="fa fa-times text-danger text"></i></a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <footer class="panel-footer">
      <div class="row">
        
        <div class="col-sm-5 text-center">
          <small class="text-muted inline m-t-sm m-b-sm">showing 20-30 of 50 items</small>
        </div>
        <div class="col-sm-7 text-right text-center-xs">                
          <ul class="pagination pagination-sm m-t-none m-b-none">
            <li><a href=""><i class="fa fa-chevron-left"></i></a></li>
            <li><a href="">1</a></li>
            <li><a href="">2</a></li>
            <li><a href="">3</a></li>
            <li><a href="">4</a></li>
            <li><a href=""><i class="fa fa-chevron-right"></i></a></li>
          </ul>
        </div>
      </div>
    </footer>
  </div>
</div>

@endsection