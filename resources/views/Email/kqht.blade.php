<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
        table{
            border-collapse: collapse;
        }
    </style>
</head>
<body>
    <h1>Trường THPT Nguyễn Huệ</h1>
    <h1>Bảng điểm của em {{$send->ho_ten}}</h1>
    <table border="1">
        <thead>
            <tr>
                @php
                    $i = 1;
                @endphp
                <th>STT</th>
                <th>Môn</th>
                <th>Hoc Kỳ</th>
                <th>Điểm Miệng</th>
                <th>Điểm 15 phút (1)</th>
                <th>Điểm 15 phút (2)</th>
                <th>Điểm 15 phút (3)</th>
                <th>Điểm 1 tiết</th>
                <th>Điểm Cuối kỳ</th>
                <th>Điểm Trung bình</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($send->diem as $value)
                <tr>
                    <td>
                        {{$i++}}
                    </td>
                    @php
                        $monhoc = App\mon_hoc::where('id', $value->id_monhoc)->get()->first();
                        echo '<td>'.$monhoc->ten.'</td>';
                    @endphp
                    @php
                    $hocky = App\hoc_ky::where('id', $value->id_hocky)->get()->first();
                    echo '<td>'.$hocky->ten_hoc_ky.' | '.$hocky->nien_khoa.'</td>';
                    @endphp
                    <td>{{$value->diem_mieng}}</td>
                    <td>{{$value->diem_15p1}}</td>
                    <td>{{$value->diem_15p2}}</td>
                    <td>{{$value->diem_15p3}}</td>
                    <td>{{$value->diem_1tiet}}</td>
                    <td>{{$value->diem_cuoiky}}</td>
                    @php
                        $tbm = $value->diem_mieng + $value->diem_15p1 + $value->diem_15p2 + $value->diem_15p3 + $value->diem_1tiet*2+  3*$value->diem_cuoiky;
                        $tbm /= 9;
                        $tbm = number_format($tbm, 2);
                        echo '<td>'.$tbm.'</td>';
                    @endphp
                    {{-- <td>{{$value->diem_tbmon}}</td> --}}
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
