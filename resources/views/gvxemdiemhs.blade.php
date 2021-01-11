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
        <li class="nav-item {{ Request::is('giao-vien/bangdiem*') ? 'active' : '' }}">
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
                <div class="">
                    <div class="card">
                        <div class="row">
                            <div class="col-sm-1">Môn:</div>
                            <div class="card-header card-header-primary">
                                <b>{{ $monhoc->ten }}</b>
                            </div>
                            <div class="col-sm-2" style="text-align: right">Lớp:</div>
                            <div class="card-header card-header card-header-tabs card-header-primary">
                                <b>{{ $tenlop->ten_lop }}</b>
                            </div>
                            <div class="col-sm-2" style="text-align: right">Học kỳ:</div>
                            <div class="card-header card-header card-header-tabs card-header-primary">
                                <b>{{ $hocky->ten_hoc_ky }}</b>
                            </div>
                        </div>

                    </div>
                </div>
                <hr>
                <div>
                    <table class="table table-striped table-bordered" id="example" style="width:100%">
                        <thead>
                            <tr>
                                <th><b>STT</b></th>
                                <th><b>Họ Tên</b></th>
                                <th><b>Miệng</b></th>
                                <th><b>15p1</b></th>
                                <th><b>15p2</b></th>
                                <th><b>15p3</b></th>
                                <th><b>1 tiết</b></th>
                                <th><b>Cuối kỳ</b></th>
                                <th><b>Tb môn </b></th>
                                <th>Chức năng</th>
                            </tr>
                        </thead>
                        @php
                        $i=1;
                        @endphp

                        <tbody>
                            @foreach ($diem as $value)
                                <tr iddiem="{{ $value->id }}">
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $value->ho_ten }}</td>
                                    <td>
                                        <input style="max-width: 25px;" class="form-control diem" type="text"
                                            name="diem_mieng" value="{{ $value->diem_mieng }}">
                                    </td>
                                    <td><input style="max-width: 13px;" class="form-control diem" type="text"
                                            name="diem_15p1" value="{{ $value->diem_15p1 }}"></td>
                                    <td><input style="max-width: 13px;" class="form-control diem" type="text"
                                            name="diem_15p2" value="{{ $value->diem_15p2 }}"></td>
                                    <td><input style="max-width: 13px;" class="form-control diem" type="text"
                                            name="diem_15p3" value="{{ $value->diem_15p3 }}"></td>
                                    <td><input style="max-width: 13px;" class="form-control diem" type="text"
                                            name="diem_1tiet" value="{{ $value->diem_1tiet }}"></td>
                                    <td><input style="max-width: 13px;" class="form-control diem" type="text"
                                            name="diem_cuoiky" value="{{ $value->diem_cuoiky }}"></td>
                                    @php
                                    $tbm = $value->diem_mieng + $value->diem_15p1 + $value->diem_15p2 +
                                    $value->diem_15p3 + $value->diem_1tiet*2+ 3*$value->diem_cuoiky;
                                    $tbm /= 9;
                                    $tbm = number_format($tbm, 2);
                                    @endphp

                                    <td>{{ $tbm }}</td>
                                    <td><a class="btn-sm btn btn-primary" href="{{url('giao-vien/suadiem/'.$value->id)}}">Sửa điểm</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{-- <form id="d1" action="{{ url('postdiem') }}" method="POST"> @csrf
                        <div class="btn btn-sm" onclick="change()">click</div>
                    </form> --}}
                    <script>
                        function change() {
                            // var inp = form.getElementsByClassName('diem');

                            // var cotdiem = inp[0].name;
                            // var val = inp[0].value;
                            // var iddiem = inp[0].getAttribute('iddiem');
                            var dataString = {
                                'cotdiem': 4,
                                'diem': 4,
                                'id': 4
                            };
                            var form = document.getElementById('d1');
                            form.submit(function(event) {
                                $.ajax({
                                    method: form.attr('method'),
                                    url: form.attr('action'),
                                    data: dataString,
                                }).done(function(response) {

                                });
                                event.preventDefault();
                                return false;
                            });

                            // var a = $('tr');
                            // var obj = {"diem":[]};

                            // for (i = 1; i < a.length; i++) {

                            //     var id = a[i].getAttribute('iddiem');
                            //     var inp = a[i].getElementsByTagName('input');

                            //     obj['diem'].push({
                            //         "id": id,
                            //         "diem_mieng": inp.diem_mieng.value,
                            //         "diem_15p1": inp.diem_15p1.value,
                            //         "diem_15p2": inp.diem_15p2.value,
                            //         "diem_15p3": inp.diem_15p3.value,
                            //         "diem_1tiet": inp.diem_1tiet.value,
                            //         "diem_cuoiky": inp.diem_cuoiky.value
                            //     });

                            // }
                            // var form = document.getElementById('d1');
                            // var data = JSON.stringify(obj);

                            // form.submit(function(event) {

                            //     $.ajax({
                            //         method: form.attr('method'),
                            //         url: form.attr('action'),
                            //         data: obj,
                            //     }).done(function(response) {

                            //     });
                            //     return false;
                            // });

                            // var st = {
                            //     'diem1': '2',
                            //     'diem2': '32'
                            // }
                            // form.submit(function(event) {
                            //     $.ajax({
                            //         method: form.attr('method'),
                            //         url: form.attr('action'),
                            //         data: st,
                            //     }).done(function(response) {

                            //     });

                            // });
                        }

                    </script>
                </div>
            </div>
        </div>
    </div>
@endsection
