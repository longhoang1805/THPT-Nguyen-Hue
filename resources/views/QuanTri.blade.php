@extends('Master')
@section('sidebar')
    <ul class="nav ">
        {{-- <li class="nav-item {{ Request::is('hoc-sinh/profile*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ url('hoc-sinh/profile') }}">
                <i class="material-icons">person</i>
                <p>Thống kê</p>
            </a>
        </li> --}}

        <li class="nav-item {{ Request::is('QuanTri/QuanTri*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ url('QuanTri/QuanTri') }}">
                <i class="material-icons">view_column</i>
                <p>Quản lý giáo viên</p>

            </a>

        </li>
        <li class="nav-item {{ Request::is('QuanTri/QuantriHocsinh*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ url('QuanTri/QuantriHocsinh/1') }}">
                <i class="material-icons">library_books</i>
                <p>Quản lý học sinh</p>
            </a>
        </li>
        <li class="nav-item {{ Request::is('QuanTri/thongbao*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ url('QuanTri/thongbao') }}">
                <i class="material-icons">assignment</i>
                <p>Thông báo</p>
            </a>
        </li>
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
                    <a class="navbar-brand" href="javascript:;">
                        Giao diện quản trị
                    </a>
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
        @php
        $i = 1;
        @endphp
        <div class="content">
            @foreach ($giaovien as $value)
            @endforeach
            <div class="container-fluid">
                <div style="align= right" >
                    <a class="btn btn-success btn-sm" href="{{url('QuanTri/them')}}">Thêm</a>
                    {{-- <button type="button" name="create_record" id="create_record" class="btn btn-success btn-sm">Create
                        Record</button> --}}
                </div>
                <div>
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th><b> STT</b></th>
                                <th><b>Họ tên</b> </th>
                                <th><b>Ngày sinh</b> </th>
                                <th><b>Giới tính</b></th>
                                <th><b>Số điện thoại</b></th>
                                <th><b>Email</b></th>
                                <th><b>Bộ môn</b></th>
                                <th><b>Hành động</b> </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($giaovien as $value)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $value->ho_ten }}</td>
                                    <td>{{ $value->ngay_sinh }}</td>
                                    <td>{{ $value->gioi_tinh }}</td>
                                    <td>{{ $value->dien_thoai }}</td>
                                    <td>{{ $value->email }}</td>
                                    <td>{{ $value->bo_mon }}</td>
                                    <td>
                                    <a class="edit btn btn-primary btn-sm" href="{{url('QuanTri/sua')}}/{{$value->id}}">Sửa</a>
                                    <a class="delete btn btn-danger btn-sm" href="{{url('QuanTri/xoa')}}/{{$value->id}}">Xóa</a></td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

@endsection
