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
                    <div class="card-header card-header-tabs card-header-primary">
                        <h4><b></b></h4>
                    </div>
                    <div class="card-body container">
                        <form action="{{url('giao-vien/bangdiem')}}" method="get">
                           {{-- @csrf --}}
                            <div class="row">
                                <div class="col-sm-3">
                                    Lớp:
                                    <select class="form-control" name="lop">
                                        @foreach ($lop as $item)
                                        <option value="{{$item->id}}">{{$item->ten_lop}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-sm-4">
                                    Môn:
                                    <select class="form-control" name="mon_hoc" id="">
                                        @foreach ($mon as $item)
                                        <option value="{{$item->id}}">{{$item->ten}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-sm-3">
                                    Học kỳ:
                                    <select class="form-control" name="hoc_ky" id="">
                                        <option value="1">Học kỳ 1 lớp 10</option>
                                        <option value="2">Học kỳ 2 lớp 10</option>
                                        <option value="3">Học kỳ 1 lớp 11</option>
                                        <option value="4">Học kỳ 2 lớp 11</option>
                                        <option value="5">Học kỳ 1 lớp 12</option>
                                        <option value="6">Học kỳ 2 lớp 12</option>
                                    </select>
                                </div>
                                <div class="col-sm-1">
                                    <button type="submit" class="btn btn-primary">Xem điểm</button>
                                </div>
                            </div>
                        </form>




                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
