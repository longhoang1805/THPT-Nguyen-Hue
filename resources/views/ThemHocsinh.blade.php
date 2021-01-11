@extends('Master')
@section('sidebar')
<ul class="nav ">


    <li class="nav-item {{ Request::is('QuanTri/QuanTri*') ? 'active' : '' }}">
        <a class="nav-link" href="{{url('QuanTri/QuanTri')}}">
            <i class="material-icons">view_column</i>
            <p>Quản lý giáo viên</p>

        </a>

    </li>
    <li class="nav-item {{ Request::is('QuanTri/them*') ? 'active' : '' }}">
        <a class="nav-link" href="{{url('QuanTri/themhs2')}}">
            <i class="material-icons">library_books</i>
            <p>Quản lý học sinh</p>
        </a>
    </li>
    <li class="nav-item {{ Request::is('QuanTri/themthongbao*') ? 'active' : '' }}">
        <a class="nav-link" href="{{url('QuanTri/themthongbao')}}">
            <i class="material-icons">assignment</i>
            <p>Thông báo</p>
        </a>
    </li>
</ul>
@endsection
@section('content')
    <div class="main-panel">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
            <div class="container-fluid">
                <div class="navbar-wrapper">
                    <a class="navbar-brand" href="javascript:;">Giao diện quản trị</a>
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
                        <li class="nav-item">
                            <a class="nav-link" href="javascript:;">
                                <i class="material-icons">dashboard</i>
                                <p class="d-lg-none d-md-block">
                                    Stats
                                </p>
                            </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <i class="material-icons">notifications</i>
                                <span class="notification">5</span>
                                <p class="d-lg-none d-md-block">
                                    Some Actions
                                </p>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-item" href="#">Mike John responded to your email</a>
                                <a class="dropdown-item" href="#">You have 5 new tasks</a>
                                <a class="dropdown-item" href="#">You're now friend with Andrew</a>
                                <a class="dropdown-item" href="#">Another Notification</a>
                                <a class="dropdown-item" href="#">Another One</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link" href="javascript:;" id="navbarDropdownProfile" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <i class="material-icons">person</i>
                                <p class="d-lg-none d-md-block">
                                    Account
                                </p>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
                                <a class="dropdown-item" href="#">Profile</a>
                                <a class="dropdown-item" href="#">Settings</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{url('dangxuat')}}">Log out</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>


        </nav>
        <div class="content">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4><b>Thêm học sinh:</b></h4>
                    </div>
                    <div class="card-body">
                        <form action="{{url('QuanTri/themhs2')}}" method="post">
                            <div class="row">
                                {{ csrf_field() }}

                                <div class="col-md-5">
                                    <div class="form-group bmd-form-group">
                                        <label class="bmd-label-floating">Họ tên</label>
                                        <input type="text" class="form-control" name="ho_ten" >
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4"><label class="bmd-label-floating">Lớp</label>
                                    <div class="form-group bmd-form-group">
                                            <select class="form-control" name="id_lop" id="">
                                                <option>-- Chọn lớp học --</option>
                                                @foreach ($lop as $value)
                                                <option value="{{$value->id}}">{{$value->ten_lop}}</option>
                                                @endforeach
                                            </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4"><label class="bmd-label-floating">Niên khóa</label>
                                    <div class="form-group bmd-form-group">
                                            <select class="form-control" name="id_hocky" id="">
                                                <option>-- Chọn niên khóa --</option>
                                                @foreach ($hocky as $item)
                                                <option value="{{$item->id_hocky}}">{{$item->nien_khoa}}</option>
                                                @endforeach
                                            </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group bmd-form-group">
                                        <label class="bmd-label-floating">Ngày sinh</label>
                                        <input type="text" class="form-control" name="ngay_sinh" >
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group bmd-form-group">
                                        <label class="bmd-label-floating">Địa chỉ</label>
                                        <input type="text" class="form-control" name="dia_chi" >
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group bmd-form-group">
                                        <label class="bmd-label-floating">Username</label>
                                        <input type="text" class="form-control" name="username1" >
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group bmd-form-group">
                                        <label class="bmd-label-floating">Password</label>
                                        <input type="text" class="form-control" name="password1" >
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Xác nhận</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
