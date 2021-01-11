<?php

namespace App\Http\Controllers;

use App\diem;
use Illuminate\Http\Request;
use App\thong_bao;
use App\giao_vien;
use App\hoc_sinh;
use App\hoc_ky;
use App\User;
use Illuminate\Support\Facades\Auth as FacadesAuth;
use Illuminate\Support\Facades\DB;
use Auth;
// use Illuminate\Support\Facades\Auth;

class MyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }
    public function getDangnhap(){
        // return var_dump (auth::id());

        return view('Dangnhap');
    }

    public function postDangnhap(Request $request){
        if(Auth::guard('hocsinh')->attempt(['username' => $request->username, 'password' => $request->password])){

           $id = auth::guard('hocsinh')->id();
            session()->flash('thanhcong', 'Đăng nhập thành công');
             return redirect('hoc-sinh/profile');

        }else if(Auth::attempt(['email' => $request->username, 'password'=>$request->password])){
            session()->flash('thanhcong', 'Đăng nhập thành công');
            return redirect('QuanTri/QuanTri');
        } else if(Auth::guard('giaovien')->attempt(['username' => $request->username,'password' => $request->password])){
            $id = Auth::guard('giaovien')->id();
            session()->flash('thanhcong', 'Đăng nhập thành công');
            return redirect('giao-vien/GiaoVien');
        }
    }

        public function loginadmin(Request $request)
        {
            # code...

        }
    public function logout()
    {
        # code...
        if(Auth::guard('hocsinh')->check())
        {
         Auth::guard('hocsinh')->logout();

        }else if(Auth::check()){
            Auth::logout();
        }elseif(Auth::guard('giaovien')->check())
        {
            Auth::guard('giaovien')->logout();
        }
        // auth::logout();
        session()->flash('thanhcong', 'Đã đăng xuất!');
        return redirect('Dangnhap');
    }

    public function xoa($id)
    {
        $gvxoa = giao_vien::find($id);

        $gvxoa->delete();
        session()->flash('thanhcong', 'Xóa thành công');
        return redirect('QuanTri/QuanTri');
    }
    public function getSua($id)
    {
        $gvedit = giao_vien::find($id);

      return view('sua',['suadata' => $gvedit]);

    }
    public function postSua(Request $request, $id){
        $gvedit  = giao_vien::find($id);
        $gvedit ->ho_ten = $request->ho_ten;
        $gvedit ->ngay_sinh = $request->ngay_sinh;
        $gvedit ->gioi_tinh = $request->gioi_tinh;
        $gvedit ->dien_thoai = $request->dien_thoai;
        $gvedit ->email = $request->email;
        $gvedit ->bo_mon = $request->bo_mon;

        $gvedit ->save();
        session()->flash('thanhcong', 'Sửa thành công');
        return redirect('QuanTri/QuanTri');
    }
    public function them(Request $request)
    {
        $giaovien = giao_vien::all();
        return view('Them', ['giaovien' => $giaovien]);

    }
    public function postthem(Request $request)
    {
        $gvthem = new giao_vien();
        $gvthem->ho_ten = $request->ho_ten;
        $gvthem->ngay_sinh = $request->ngay_sinh;
        $gvthem->gioi_tinh = $request->gioi_tinh;
        $gvthem->dien_thoai = $request->dien_thoai;
        $gvthem->email = $request->email;
        $gvthem->bo_mon = $request->bo_mon;
        session()->flash('thanhcong', 'Thêm thành công');
        $gvthem->save();

        return redirect('QuanTri/QuanTri');
    }

    public function QuanTri()
    {
        $giaovien = giao_vien::all();
        return view('QuanTri', ['giaovien' => $giaovien]);

    }
    public function GiaoVien()
    {
        $id = Auth::guard('giaovien')->id();
        $usergv = DB::select('select * from giao_viens where id = ?', [$id]);
        return view('GiaoVien',['gvs'=>$usergv]);
    }
    public function profile(){

        $id = Auth::guard('hocsinh')->id();

        $userhs = DB::select('select * from lops, hoc_sinhs where lops.id  = hoc_sinhs.id_lop and hoc_sinhs.id= ?', [$id]);
         return view('thongtin_hs', ['hss'=> $userhs]);

    }
    public function bangdiem($ky)
    {
        $id = Auth::guard('hocsinh')->id();
        $diem = DB::select('select * from diems, mon_hocs where mon_hocs.id = diems.id_monhoc and diems.id_hocsinh = ? and diems.ky = ?',[$id, $ky]);
       return view('HocSinh', ['diem' => $diem]);
    }
    public function hanhkiem(){
        $id = Auth::guard('hocsinh')->id();
        $hk = DB::select('select * from hanh_kiems, hoc_kies, hoc_sinhs where hoc_sinhs.id =? and hanh_kiems.id_hocky =  hoc_kies.id', [$id]);
        return view('HanhKiem',['hk' => $hk]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        echo 'hi';
        $thongbao = thong_bao::where('ID_thongbao', $id)->get();

;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        echo 'll';
        $thongbao = thong_bao::where('ID_thongbao', $id);
        $thongbao->delete();
    }

}
