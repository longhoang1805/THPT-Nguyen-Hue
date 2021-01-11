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
                @if (session('success'))
                    <div class="alert alert-success">
                        {{session('success')}}
                    </div>
                @endif
                <div class="card">
                {{-- Họ Tên: <b>{{$hs ?? ''->ho_ten}}</b> --}}
                </div>
                <div>
                    <form action="">
                        <select class="form-control" name="hocki" id="" style="max-width: 200px" onchange="change(this.value)">
                            <option {{ Request::is('*/1') ? 'selected="selected"' : '' }} value="1">Học kì 1, Lớp 10</option>
                            <option {{ Request::is('*/2') ? 'selected="selected"' : '' }} value="2">Học kì 2, Lớp 10</option>
                            <option {{ Request::is('*/3') ? 'selected="selected"' : '' }} value="3">Học kì 1, Lớp 11</option>
                            <option {{ Request::is('*/4') ? 'selected="selected"' : '' }} value="4">Học kì 2, Lớp 11</option>
                            <option {{ Request::is('*/5') ? 'selected="selected"' : '' }} value="5">Học kì 1, Lớp 12</option>
                            <option {{ Request::is('*/6') ? 'selected="selected"' : '' }} value="6">Học kì 2, Lớp 12</option>
                        </select>
                        <script>
                            function change(ki){
                                window.location= "./"+ki;
                            }
                        </script>
                    </form>
                    <div class="float-right">
                        <a href="{{ url('send', Auth::guard('hocsinh')->id()) }}" class="edit btn btn-primary btn-sm">Xuất bảng điểm</a>
                    </div>
                </div>
                <hr>
                @php
                $i = 1;
                @endphp
                <div>
                    <table  class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th><b>STT</b></th>
                                <th><b>Môn</b></th>
                                <th><b>Miệng</b></th>
                                <th><b>15p1</b></th>
                                <th><b>15p2</b></th>
                                <th><b>15p3</b></th>
                                <th><b>1 tiết</b></th>
                                <th><b>Cuối kỳ</b></th>
                                <th><b>Tb môn </b></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($diem as $value)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $value->ten }}</td>
                                    <td>{{ $value->diem_mieng }}</td>
                                    <td>{{ $value->diem_15p1 }}</td>
                                    <td>{{ $value->diem_15p2 }}</td>
                                    <td>{{ $value->diem_15p3 }}</td>
                                    <td>{{ $value->diem_1tiet }}</td>
                                    <td>{{ $value->diem_cuoiky }}</td>
                                    @php
                                        $tbm = $value->diem_mieng + $value->diem_15p1 + $value->diem_15p2 + $value->diem_15p3 + $value->diem_1tiet*2+  3*$value->diem_cuoiky;
                                        $tbm /= 9;
                                        $tbm = number_format($tbm, 2);
                                    @endphp

                                    <td>{{ $tbm }}</td>
                                </tr>
                            @endforeach
                        </tbody>

                    </table>

                </div>

            </div>

        </div>


    </div>
@endsection
