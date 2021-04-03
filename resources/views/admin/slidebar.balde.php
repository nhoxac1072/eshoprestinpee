@extends('admin-layout')
@section('slide_bar')

<div class="leftside-navigation">
            <ul class="sidebar-menu" id="nav-accordion">
                <li>
                    <a class="active" href="{{URL::to('/dashboard')}}>
                        <i class="fa fa-dashboard "></i>
                        <span>Tổng quan menu</span>
                    </a>
                </li>
                
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-book"></i>
                        <span>UI Elements</span>
                    </a>
                    <ul class="sub">
						<li><a href="typography.html">thêm danh mục</a></li>
						<li><a href="glyphicon.html">liệt kê danh mục</a></li>
                        <li><a href="grids.html">Grids</a></li>
                    </ul>
                </li>      
            </ul>            
        </div>
@endsection