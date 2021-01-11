@extends('Master')
@section('sidebar')
<ul class="nav ">
    <li class="nav-item {{ Request::is('hoc-sinh/profile*') ? 'active' : '' }}">
        <a class="nav-link" href="{{url('hoc-sinh/profile')}}">
            <i class="material-icons">person</i>
            <p>Thông tin học sinh</p>
        </a>
    </li>

    <li class="nav-item {{ Request::is('hoc-sinh/bangdiem*') ? 'active' : '' }}">
        <a class="nav-link" href="{{url('hoc-sinh/bangdiem/1')}}">
            <i class="material-icons">view_column</i>
            <p>Bảng Điểm</p>

        </a>

    </li>
    <li class="nav-item {{ Request::is('hoc-sinh/hanhkiem*') ? 'active' : '' }}">
        <a class="nav-link" href="{{url('hoc-sinh/hanhkiem')}}">
            <i class="material-icons">library_books</i>
            <p>Hạnh Kiểm</p>
        </a>
    </li>
    <li class="nav-item {{ Request::is('hoc-sinh/thongbao*') ? 'active' : '' }}">
        <a class="nav-link" href="{{url('hoc-sinh/thongbao')}}">
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

                                <a class="dropdown-item" href="{{url('dangxuat')}}">Log out</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>


        </nav>
        <!-- End Navbar -->

        <div class="content">
            <div class="container-fluid">
                <hr>
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4><b>Thông tin học sinh</b> </h4>
                    </div>
                    <div class="card-body">
                        <hr>
                        @foreach($hss as $hs)
                        <table height="300" width="550" style="font-size: 19px; ">
                            <tr>
                                <td>Mã học sinh:</td>
                                <td><b>{{$hs->id}}</b></td>
                            </tr>

                            <tr>
                                <td>Họ Tên:</td>
                                <td><b>{{$hs->ho_ten}}</b></td>
                            </tr>

                            <tr>
                                <td>Lớp:</td>
                                <td><b>{{$hs->ten_lop}}</b></td>
                            </tr>

                            <tr>
                                <td>Ngày sinh:</td>
                                <td><b>{{$hs->ngay_sinh}}</b></td>
                            </tr>



                            <tr>
                                <td>Địa chỉ:</td>
                                <td><b>{{$hs->dia_chi}}</b></td>
                            </tr>


                        </table>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
