@extends('Master')
@section('sidebar')
    <ul class="nav">
        <ul class="nav ">
            <li class="nav-item {{ Request::is('giao-vien/GiaoVien*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('giao-vien/GiaoVien') }}">
                    <i class="material-icons">person</i>
                    <p>Thông tin cá nhân</p>
                </a>
            </li>
            <li class="nav-item {{ Request::is('giao-vien/suadiem*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('giao-vien/suadiem') }}">
                    <i class="material-icons">view_column</i>
                    <p>Quản lý điểm</p>

                </a>
            </li>
            <li class="nav-item {{ Request::is('giao-vien/thongbaogv*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('giao-vien/thongbaogv') }}">
                    <i class="material-icons">assignment</i>
                    <p>Thông báo</p>
                </a>
            </li>
            {{-- <li class="nav-item {{ Request::is('hoc-sinh/baitap*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('hoc-sinh/baitap') }}">
                    <i class="material-icons">assignment</i>
                    <p></p>
                </a>
            </li> --}}
        </ul>

    @endsection
    @section('content')
        <div class="main-panel">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
                <div class="container-fluid">
                    <div class="navbar-wrapper">
                        <a class="navbar-brand" href="javascript:;">
                            Giao diện giáo viên
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

                                    <a class="dropdown-item" href="{{ url('dangxuat') }}">Log out</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>


            <div class="content">
                <div class="container-fluid">
                    <div class="">
                        <div class="card">
                            <div class="card-header card-header-tabs card-header-primary">
                                Sửa điểm
                            </div>
                            <div class="card-body">
                                <form action="{{url('giao-vien/diem')}}/{{ $diem->id }}" method="POST">

                                    <div class="row">
                                        {{ csrf_field() }}
                                        <label for="" class="col-sm-2">Điểm miệng</label>
                                        <input type="text" class="form-control col-sm-1" name="diem_mieng"
                                            value="{{ $diem->diem_mieng }}">
                                    </div>
                                    <div class="row">
                                        <label for="" class="col-sm-2">Điểm 15p1 </label>
                                        <input type="text" class="form-control col-sm-1" name="diem_15p1"
                                            value="{{ $diem->diem_15p1 }}">
                                    </div>
                                    <div class="row">
                                        <label for="" class="col-sm-2">Điểm 15p2</label>
                                        <input type="text" class="form-control col-sm-1" name="diem_15p2"
                                            value="{{ $diem->diem_15p2 }}">
                                    </div>
                                    <div class="row">
                                        <label for="" class="col-sm-2">Điểm 15p3</label>
                                        <input type="text" class="form-control col-sm-1" name="diem_15p3"
                                            value="{{ $diem->diem_15p3 }}">
                                    </div>
                                    <div class="row">
                                        <label for="" class="col-sm-2">Điểm 1 tiết</label>
                                        <input type="text" class="form-control col-sm-1" name="diem_1tiet"
                                            value="{{ $diem->diem_1tiet }}">
                                    </div>
                                    <div class="row">
                                        <label for="" class="col-sm-2">Điểm cuối kỳ</label>
                                        <input type="text" class="form-control col-sm-1" name="diem_cuoiky"
                                            value="{{ $diem->diem_cuoiky }}">
                                    </div>
                                    {{-- <input type="text" name="id"  value="{{$id}}" style="display: none"> --}}
                                    <input type="submit" class="btn btn-primary">
                                </form>

                            </div>
                        </div>
                    </div>
                    <hr>
                    <div>

                    </div>
                </div>
            </div>
        </div>
    @endsection
