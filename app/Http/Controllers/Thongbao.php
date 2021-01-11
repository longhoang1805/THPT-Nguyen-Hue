<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Carbon\carbon;
class Thongbao extends Controller
{
    //
    public function thongbao(){
        $tb = DB::table('thong_baos')->orderBy('ID','DESC')->paginate(5);
        return view('thongbao', ['thongbao'=>$tb]);
    }
    public function chitiet($id){
        $tb = DB::table('thong_baos')->find($id);
        return view('chitiet', ['tb'=>$tb]);
    }
    public function chitiet2($id){
        $tb = DB::table('thong_baos')->find($id);
        return view('chitiet2', ['tb'=>$tb]);
    }
    public function chitiet3($id){
        $tb = DB::table('thong_baos')->find($id);
        return view('chitiet3', ['tb'=>$tb]);
    }
    public function create(Request $request)
    {
        //
        $tieude = $request->tieude;
        $noidung = $request->noidung;
        $tenanh ='';
        $tenfile ='';
        if($request->hasFile('anh')){
            $so = DB::select('SELECT MAX(id) AS max FROM thong_baos');
            $so = $so[0]->max;
            $anh = $request ->anh;
            $tenanh = $anh->getClientOriginalExtension();
            $tenanh= 'anh'.$so.'.'.$tenanh;

            $request->file('anh')->move('img', "$tenanh");
        }
        if($request->hasFile('file')){
            $so = DB::select('SELECT MAX(id) AS max FROM thong_baos');
            $so = $so[0]->max;
            $file = $request ->file;
            $tenfile = $file->getClientOriginalExtension();
            $tenfile= 'file'.$so.'.'.$tenfile;

            $request->file('file')->move('file', "$tenfile");
        }
        Carbon::setLocale('vi');
        $time =Carbon::now('Asia/Ho_Chi_Minh');
        DB::table('thong_baos')->insert([
            'tieu_de' => $tieude,
            'noi_dung' => $noidung,
            'anh' => $tenanh,
            'file' => $tenfile,
            'ngay_dang' => $time
        ]);
        session()->flash('thanhcong', 'Thông báo đã được thêm');
       return redirect('giao-vien/thongbaogv');
    }
    public function create2(Request $request)
    {
        //
        $tieude = $request->tieude;
        $noidung = $request->noidung;
        $tenanh ='';
        $tenfile ='';
        if($request->hasFile('anh')){
            $so = DB::select('SELECT MAX(id) AS max FROM thong_baos');
            $so = $so[0]->max;
            $anh = $request ->anh;
            $tenanh = $anh->getClientOriginalExtension();
            $tenanh= 'anh'.$so.'.'.$tenanh;

            $request->file('anh')->move('img', "$tenanh");
        }
        if($request->hasFile('file')){
            $so = DB::select('SELECT MAX(id) AS max FROM thong_baos');
            $so = $so[0]->max;
            $file = $request ->file;
            $tenfile = $file->getClientOriginalExtension();
            $tenfile= 'file'.$so.'.'.$tenfile;

            $request->file('file')->move('file', "$tenfile");
        }
        Carbon::setLocale('vi');
        $time =Carbon::now('Asia/Ho_Chi_Minh');
        DB::table('thong_baos')->insert([
            'tieu_de' => $tieude,
            'noi_dung' => $noidung,
            'anh' => $tenanh,
            'file' => $tenfile,
            'ngay_dang' => $time
        ]);
        session()->flash('thanhcong', 'Thông báo đã được thêm');
       return redirect('QuanTri/thongbao');
    }
    public function suathongbao($id){
        $tb = DB::table('thong_baos')->find($id);
        return view('suathongbao', ['tb'=>$tb]);
    }
    public function suathongbao2($id){
        $tb = DB::table('thong_baos')->find($id);
        return view('suathongbao2', ['tb'=>$tb]);
    }
    public function updateThongbao(Request $request){
        $id = $request->id;
        $tieu_de  = $request->tieu_de;
        $noi_dung = $request->noi_dung;
        $tb = DB::update('update thong_baos set tieu_de = ?, noi_dung=? where id = ?', [$tieu_de, $noi_dung, $id]);
        session()->flash('thanhcong', 'Thông báo đã được thay đổi');
        return redirect('giao-vien/thongbaogv');
    }
    public function xoathongbao($id){
        $tb = DB::table('thong_baos')->where('id', $id)->delete();
        session()->flash('thanhcong', 'Xóa thành công');
        return redirect('giao-vien/thongbaogv');
    }
    public function updateThongbao2(Request $request){
        $id = $request->id;
        $tieu_de  = $request->tieu_de;
        $noi_dung = $request->noi_dung;
        $tb = DB::update('update thong_baos set tieu_de = ?, noi_dung=? where id = ?', [$tieu_de, $noi_dung, $id]);
        session()->flash('thanhcong', 'Thông báo đã được thay đổi');
        return redirect('QuanTri/thongbao');
    }
    public function xoathongbao2($id){
        $tb = DB::table('thong_baos')->where('id', $id)->delete();
        session()->flash('thanhcong', 'Xóa thành công');
        return redirect('QuanTri/thongbao');
    }
    public function thongbaogv(){
        $tb = DB::table('thong_baos')->orderBy('ID','DESC')->paginate(3);
        return view('thongbaogv', ['thongbao'=>$tb]);
    }
    public function thongbaoquantri(){
        $tb = DB::table('thong_baos')->orderBy('ID','DESC')->paginate(3);
        return view('thongbaoquantri', ['thongbao'=>$tb]);
    }
}
