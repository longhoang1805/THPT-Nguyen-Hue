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
        <li class="nav-item {{ Request::is('giao-vien/suathongbao*') ? 'active' : '' }}">
            <a class="nav-link" href="{{url('giao-vien/suathongbao')}}">
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
                    <a class="navbar-brand" href="javascript:;">Giao diện học sinh</a>
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
                        <h4><b>Sửa thông báo:</b></h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('giao-vien/updateThongbao') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <input style="display: none" type="text" name="id" value="{{$tb->id}}">
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="form-group bmd-form-group">
                                        <label class="bmd-label-floating">Tiêu đề</label>
                                        <input type="text" class="form-control" value="{{$tb->tieu_de}}" name="tieu_de">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-7">
                                    <div class="form-group bmd-form-group">
                                        <label class="bmd-label-floating">Nội dung</label>

                                        <textarea name="noi_dung" class="form-control" cols="30" rows="10">{{$tb->noi_dung}}</textarea>
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
