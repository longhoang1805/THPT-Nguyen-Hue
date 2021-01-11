<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\KQHT;
use App\Mail\send;
use App\diem;
use App\hoc_sinh;
use App\mon_hoc;
use App\hoc_ky;
use Auth;
class KQHTController extends Controller
{
    //
    public function sendmail($id)
    {
        # code...
        $send = hoc_sinh::find($id);
        // foreach($send->diem as $value){
        //     echo $value->id.'<br>';
        //     echo $value->diem_mieng.'<br>';
        //     // echo $value->hoc_ky->ten_hoc_ky.'<br>';
        //     $hocky = hoc_ky::where('id', $value->id_hocky)->get()->first();
        //     echo $hocky->ten_hoc_ky;
        //     $monhoc = mon_hoc::where('id', $value->id_monhoc)->get()->first();
        //     echo $monhoc->ten;
        // }
        Mail::to('hlong.19it3@vku.udn.vn')->send(new send($send));

        return redirect('hoc-sinh/bangdiem/'.Auth::guard('hocsinh')->id())->with('success', 'Gửi thành công! Hãy kiểm tra hộp thư của bạn');
    }
}
