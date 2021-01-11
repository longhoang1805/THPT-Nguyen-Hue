@extends('Master')
@section('sidebar')
<ul class="nav">
    <ul class="nav ">
        <li class="nav-item {{ Request::is('giao-vien/GiaoVien*') ? 'active' : '' }}">
            <a class="nav-link" href="{{url('giao-vien/GiaoVien')}}">
                <i class="material-icons">person</i>
                <p>Thông tin cá nhân</p>
            </a>
        </li>
        <li class="nav-item {{ Request::is('giao-vien/quanlydiem*') ? 'active' : '' }}">
            <a class="nav-link" href="{{url('giao-vien/quanlydiem')}}">
                <i class="material-icons">view_column</i>
                <p>Quản lý điểm</p>

            </a>
        </li>
        <li class="nav-item {{ Request::is('giao-vien/thongbaogv*') ? 'active' : '' }}">
            <a class="nav-link" href="{{url('giao-vien/thongbaogv')}}">
                <i class="material-icons">assignment</i>
                <p>Thông báo</p>
            </a>
        </li>
        {{-- <li class="nav-item {{ Request::is('hoc-sinh/baitap*') ? 'active' : '' }}">
            <a class="nav-link" href="{{url('hoc-sinh/baitap')}}">
                <i class="material-icons">assignment</i>
                <p></p>
            </a>
        </li> --}}
    </ul>

@endsection
@section('content')
@if (session()->has('thanhcong'))
        <div data-notify="container" class="col-11 col-md-4 alert alert-primary alert-with-icon animated fadeInDown"
            role="alert" data-notify-position="top-right"
            style="display: inline-block; margin: 15px auto; position: fixed; transition: all 0.5s ease-in-out 0s; z-index: 1031; top: 20px; right: 20px;">
            <button onclick="xoa()" type="button" aria-hidden="true" class="close" data-notify="dismiss"
                style="position: absolute; right: 10px; top: 50%; margin-top: -9px; z-index: 1033;">
                <i class="material-icons">
                    close
                </i>
            </button>
            <i data-notify="icon" class="material-icons">add_alert</i>
            <span data-notify="title"></span>
            <span data-notify="message">
                {{ session()->get('thanhcong') }}
            </span>
            <a href="#" target="_blank" data-notify="url"></a>
        </div>
        <script>
            function xoa() {

                $("div.alert").remove();
            }
            var t = setTimeout(function() {
                $("div.alert").remove();
            }, 5000);

        </script>
    @endif
    <div class="main-panel">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
            <div class="container-fluid">
                <div class="navbar-wrapper">
                    <a class="navbar-brand" href="javascript:;">Giao diện giáo viên</a>
                </div>
                <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="navbar-toggler-icon icon-bar"></span>
                    <span class="navbar-toggler-icon icon-bar"></span>
                    <span class="navbar-toggler-icon icon-bar"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end">

                    <ul class="navbar-nav">

                        <li class="nav-item dropdown">
                            <a class="nav-link" href="javascript:;" id="navbarDropdownProfile" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <i class="material-icons">person</i>
                                <p class="d-lg-none d-md-block">
                                    Account
                                </p>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">

                                <a class="dropdown-item" href="{{url('dangxuat')}}">Log out</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>


        </nav>
        <!-- End Navbar -->
        {{-- @php
        $i = 1;
        @endphp --}}
        <div class="content">
            <div class="container-fluid">
                <hr>
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4><b>Thông tin giáo viên</b> </h4>
                    </div>
                    <div class="card-body">
                        <hr>
                        @foreach($gvs as $gv)
                        <table height="400" width="550" style="font-size: 19px; ">
                            <tr>
                                <td>Mã giáo viên:</td>
                                <td><b>{{$gv->id}}</b></td>
                            </tr>

                            <tr>
                                <td>Họ tên:</td>
                                <td><b>{{$gv->ho_ten}}</b></td>
                            </tr>

                            <tr>
                                <td>Ngày sinh:</td>
                                <td><b>{{$gv->ngay_sinh}}</b></td>
                            </tr>

                            <tr>
                                <td>Giới tính:</td>
                                <td><b>{{$gv->gioi_tinh}}</b></td>
                            </tr>



                            <tr>
                                <td>Điện thoại:</td>
                                <td><b>{{$gv->dien_thoai}}</b></td>
                            </tr>
                            <tr>
                                <td>Email:</td>
                                <td><b>{{$gv->email}}</b></td>
                            </tr>
                            <tr>
                                <td>Bộ môn:</td>
                                <td><b>{{$gv->bo_mon}}</b></td>
                            </tr>
                        </table>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
