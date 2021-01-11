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
                <div class="card">
                {{-- Họ Tên: <b>{{$hs ?? ''->ho_ten}}</b> --}}
                </div>
                <hr>
                @php
                $i = 1;
                @endphp
                <div>
                    <table  class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            @foreach ($hk as $value)
                            <tr>
                                <td><b>Họ Tên:</b> </td>
                                <td><b>{{$value->ho_ten}}</b></td>
                            </tr>
                            @endforeach
                            <tr>
                                <th><b>STT</b></th>
                                <th><b>Năm</b></th>
                                <th><b>Niên khóa</b></th>
                                <th><b>Học kỳ 1</b></th>
                                <th><b>Học kỳ 2</b></th>
                                <th><b>Cả năm</b></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($hk as $value)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $value->nam }}</td>
                                    <td>{{ $value->nien_khoa }}</td>
                                    <td>{{ $value->xep_loai }}</td>
                                    <td>{{ $value->xep_loai }}</td>
                                    <td>{{ $value->ca_nam }}</td>
                                </tr>
                            @endforeach
                        </tbody>

                    </table>

                </div>

            </div>

        </div>


    </div>
@endsection
