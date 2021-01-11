@extends('Master')
@section('sidebar')
<ul class="nav ">
    <li class="nav-item {{ Request::is('hoc-sinh/profile*') ? 'active' : '' }}">
        <a class="nav-link" href="{{url('hoc-sinh/profile')}}">
            <i class="material-icons">person</i>
            <p>Thống kê</p>
        </a>
    </li>

    <li class="nav-item {{ Request::is('QuanTri/sua*') ? 'active' : '' }}">
        <a class="nav-link" href="{{url('QuanTri/sua')}}">
            <i class="material-icons">view_column</i>
            <p>Quản lý giáo viên</p>

        </a>

    </li>
    <li class="nav-item {{ Request::is('QuanTri/QuantriHocsinh*') ? 'active' : '' }}">
        <a class="nav-link" href="{{url('QuanTri/QuantriHocsinh/12')}}">
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
                        <h4><b>Thay đổi thông tin giáo viên:</b></h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('QuanTri/sua') }}/{{ $suadata->id }}" method="POST">
                            <div class="row">
                                {{ csrf_field() }}
                                <div class="col-md-5">
                                    <div class="form-group bmd-form-group">
                                        <label class="bmd-label-floating">Họ tên</label>
                                        <input type="text" class="form-control" name="ho_ten"  value="{{ $suadata->ho_ten }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group bmd-form-group">
                                        <label class="bmd-label-floating">Ngày sinh</label>
                                        <input type="text" class="form-control" name="ngay_sinh" value="{{ $suadata->ngay_sinh }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group bmd-form-group">
                                        <label class="bmd-label-floating">Giới tính</label>
                                        <input type="text" class="form-control" name="gioi_tinh" value="{{ $suadata->gioi_tinh }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group bmd-form-group">
                                        <label class="bmd-label-floating">Số điện thoại</label>
                                        <input type="text" class="form-control" name="dien_thoai"  value="{{ $suadata->dien_thoai }}">
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-group bmd-form-group">
                                        <label class="bmd-label-floating">Email</label>
                                        <input  type="text" class="form-control" name="email"  value="{{ $suadata->email }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group bmd-form-group">
                                        <label class="bmd-label-floating">Bộ môn</label>
                                        <input type="text" class="form-control" name="bo_mon"  value="{{ $suadata->bo_mon }}">
                                    </div>
                                </div>

                            </div>
                            {{-- <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group bmd-form-group">
                                        <label class="">Môn</label>
                                        <select class="form-control" name="bo_mon" id="">

                                            <option value="{{}}">{{}}</option>
                                        </select>
                                    </div>
                                </div>
                            </div> --}}
                            <button type="submit" class="btn btn-primary">Xác nhận</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


        {{-- </nav>
        <!-- End Navbar -->
        <div class="content">
            <div class="container-fluid">
                <div>
                    <form action="{{ url('QuanTri/sua') }}/{{ $suadata->id }}" method="post">
                        <div class="form-group">
                            {{ csrf_field() }}
                            <input type="text" class="form-control" name="ho_ten" id="" value="{{ $suadata->ho_ten }}"><br>
                            <input type="text" class="form-control" name="ngay_sinh" id="" value="{{ $suadata->ngay_sinh }}"><br>
                            <input type="text" class="form-control" name="gioi_tinh" id="" value="{{ $suadata->gioi_tinh }}"><br>
                            <input type="text" class="form-control" name="dien_thoai" id="" value="{{ $suadata->dien_thoai }}"><br>
                            <input type="text" class="form-control" name="email" id="" value="{{ $suadata->email }}"><br>
                            <input type="text" class="form-control" name="bo_mon" id="" value="{{ $suadata->bo_mon }}"><br>
                            <input class="btn btn-primary btn-block" type="submit" value="Cập nhật">
                        </div>
                    </form>
                </div>
            </div>
        </div>

    @endsection --}}
