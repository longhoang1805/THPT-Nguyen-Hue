<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\hoc_sinh;
use App\hoc_ky;
use App\lop;
use App\mon_hoc;
use App\diem;
use DataTables;
use Validator;
use Auth;
use Crypt;
use Illuminate\Support\Facades\Auth as FacadesAuth;
use Illuminate\Support\Facades\DB;
class QuantriHocsinh extends Controller
{
    public function QuanTriHocsinh($lop){
        // $hocsinh = hoc_sinh::all();
        $id = Auth::guard('hocsinh')->id();

        $hocsinh = DB::select('select hoc_sinhs.username, hoc_sinhs.id, hoc_sinhs.ho_ten, hoc_sinhs.dia_chi, hoc_sinhs.ngay_sinh, lops.ten_lop, hoc_kies.nien_khoa
        from hoc_sinhs left join lops on hoc_sinhs.id_lop = lops.id left join hoc_kies on hoc_sinhs.id_hocky = hoc_kies.id
         where  hoc_sinhs.id_lop = ?', [$lop]);
        // $hocsinh = hoc_sinh::where([
        //     ['id_lop', '12'],
        //     ['id_hocky', '6']
        // ])->get();

         return view('QuantriHocsinh', ['hocsinh' => $hocsinh]);
    }
    public function xoa($id)
    {
        // $hsxoa = hoc_sinh::find($id);
        $xoa = DB::delete('DELETE FROM diems WHERE id_hocsinh = ?', [$id]);
        $xoa = DB::delete('DELETE FROM hoc_sinhs WHERE id = ?', [$id]);
        $xoa = DB::delete('DELETE FROM hanh_kiems WHERE id_hocsinh = ?', [$id]);
        // $hsxoa->delete();
        session()->flash('thanhcong', 'Xóa thành công');
        return redirect()->back();
    }
    public function getSua($id)
    {
        $hsedit = hoc_sinh::find($id);
        $lop = DB::table('lops')->get();
        $hocky = DB::table('hoc_kies')->get();
        return view('Sua2',['suadata' => $hsedit, 'lops'=> $lop,'hockies'=>$hocky]);

    }
    public function postSua(Request $request, $id){
        $hsedit  = hoc_sinh::find($id);
        $hsedit -> ho_ten = $request->ho_ten;
        $hsedit -> id_lop = $request->id_lop;
        $hsedit -> id_hocky = $request->id_hocky;
        $hsedit -> ngay_sinh = $request->ngay_sinh;
        $hsedit -> dia_chi = $request->dia_chi;
        $hsedit ->save();
        session()->flash('thanhcong', 'Sửa thành công');
        return redirect('QuanTri/QuantriHocsinh/12');
    }
    public function them(){
          $lop = lop::all();
         $hocky = hoc_ky::all();
          return view('ThemHocsinh',['lop'=>$lop,'hocky'=>$hocky]);
    }
    public function postthem(Request $request){
        $id = DB::table('hoc_sinhs')->max('id') +1;

    $data = new hoc_sinh([
        'id'=> $id,
    'ho_ten' => $request->get('ho_ten'),
    'id_lop'=> $request->get('id_lop'),
    'id_hocky'=> $request->get('id_hocky'),
    'ngay_sinh'=> $request->get('ngay_sinh'),
    'dia_chi'=> $request->get('dia_chi'),
    'username'=> $request->get('username1'),
     'password'=> (bcrypt($request->get('password1')))

]); $data->save();
        DB::select("INSERT INTO diems(id_hocsinh, id_monhoc, id_hocky, ky) VALUES
        ($id, 1, 1, 1),($id, 2, 1, 1),($id, 3, 1, 1),($id, 5, 1, 1),($id, 6, 1, 1),($id, 7, 1, 1),($id, 8, 1, 1),($id, 9, 1, 1),($id, 10, 1, 1),($id, 11, 1, 1),($id, 12, 1, 1),($id, 13, 1, 1),($id, 14, 1, 1),
        ($id, 1, 1, 2),($id, 2, 1, 2),($id, 3, 1, 2),($id, 5, 1, 2),($id, 6, 1, 2),($id, 7, 1, 2),($id, 8, 1, 2),($id, 9, 1, 2),($id, 10, 1, 2),($id, 11, 1, 2),($id, 12, 1, 2),($id, 13, 1, 2),($id, 14, 1, 2)
        ");

         session()->flash('thanhcong', 'Thêm thành công');

        return redirect('QuanTri/QuantriHocsinh/12');
    }
    public function quanlydiem(){
        $lop = lop::all();
        $mon = mon_hoc::all();

        // $mon = DB::table('mon_hocs')->all();
        return view('quanlydiem', ['lop'=>$lop, 'mon'=>$mon]);
    }
    public function bangdiem(){
        $lop = $_GET['lop'];
        $mon = $_GET['mon_hoc'];
        $hocky = $_GET['hoc_ky'];
        // $hocsinh = hoc_sinh::where('id_lop', $lop)->get();

        // foreach($hocsinh as $value){
        //     $diem = diem::where([['id_hocky', $hocky], ['id_monhoc', $mon], ['id_hocsinh', $value->id]])->get()->first();
        //     if($diem){
        //         echo $diem->diem_mieng.'<br>';
        //         echo $diem->diem_15p1.'<br>';
        //         echo $diem->diem_1tiet.'<br>';
        //     }
        $diem = DB::select('SELECT * FROM hoc_sinhs, diems WHERE diems.id_hocsinh = hoc_sinhs.id and hoc_sinhs.id_lop = ? and diems.id_hocky = ? and diems.id_monhoc = ?', [$lop, $hocky, $mon]);
        $monhoc = DB::table('mon_hocs')->find($mon);
        $tenlop = DB::table('lops')->find($lop);
        $hocky = DB::table('hoc_kies')->find($hocky);
        return view('gvxemdiemhs', ['diem' => $diem, 'monhoc' => $monhoc, 'tenlop' => $tenlop,'hocky'=>$hocky]);
    }
    public function suadiem($id){
        // $diem= DB::table('diems')->find($id);
        $diem = diem::find($id);
        return view('suadiem', ['diem'=>$diem]);
    }
    public function diem(Request $request, $id){
        // $diem_mieng = $request->diem_mieng;
        // $diem_15p1 = $request->diem_15p1;
        // $diem_15p2 = $request->diem_15p2;
        // $diem_15p3 = $request->diem_15p3;
        // $diem_1tiet  = $request->diem_1tiet;
        // $diem_cuoiky = $request->diem_cuoiky;
        // $id = $request->id;
        // $diem = DB::select("UPDATE `diems` SET `diem_mieng`= ?,`diem_15p1` = ?, `diem_15p2` = ?,`diem_15p3` = ?,`diem_1tiet` = ?, `diem_cuoiky` = ? where id = ?",
        // [$diem_mieng, $diem_15p1, $diem_15p2, $diem_15p3, $diem_1tiet, $diem_cuoiky, $id]);
        $diem  = diem::find($id);
        $diem -> diem_mieng = $request->diem_mieng;
        $diem -> diem_15p1 = $request->diem_15p1;
        $diem -> diem_15p2 = $request->diem_15p2;
        $diem -> diem_15p3 = $request->diem_15p3;
        $diem -> diem_1tiet = $request->diem_1tiet;
        $diem -> diem_cuoiky = $request->diem_cuoiky;
        $diem ->save();
        $hs = DB::select('SELECT hoc_sinhs.id_lop FROM `diems`, hoc_sinhs WHERE diems.id= ? and hoc_sinhs.id = diems.id_hocsinh', [$id]);

        $lop = $hs[0]->id_lop;
        $mon = $diem->id_monhoc;
        $hocky = $diem->ky;
        session()->flash('thanhcong', 'Sửa thành công');
        return redirect("giao-vien/bangdiem?lop=$lop&mon_hoc=$mon&hoc_ky=$hocky");
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if($request->ajax())
        {
            $data = hoc_sinh::latest()->get();
            return DataTables::of($data)
                    ->addColumn('action', function($data){
                        $button = '<button type="button" name="edit" id="'.$data->id.'" class="edit btn btn-primary btn-sm">Edit</button>';
                        $button .= '&nbsp;&nbsp;&nbsp;<button type="button" name="edit" id="'.$data->id.'" class="delete btn btn-danger btn-sm">Delete</button>';
                        return $button;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        $hocsinh = hoc_sinh::all();
        return view('QuanTri/QuanTriHocsinh', ['hocsinh' => $hocsinh]);
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
        $rules = array(
            'ho_ten'    =>  'required',
            'id_lop' =>  'required',
            'id_hocky' =>  'required',
            'ngay_sinh'=>  'required',
            'dia_chi'     =>  'required',
            'musername'    =>  'required',
            'password'   => 'required'
        );
        $this->validate($request, [], []);
        $error = Validator::make($request->all(), $rules);

        if($error->fails())
        {
            return response()->json(['errors' => $error->errors()->all()]);
        }

        $form_data = array(
            'ho_ten'        =>  $request->ho_ten,
            'id_lop'     =>  $request->id_lop,
            'id_hocky'     =>  $request->id_hocky,
            'ngay_sinh'    =>  $request->ngay_sinh,
            'dia_chi'         =>  $request->dia_chi,
            'username'        =>  $request->username,
            'password'        =>  $request->password
        );

        hoc_sinh::create($form_data);

        return response()->json(['success' => 'Data Added successfully.']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\hoc_sinh  $hs
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\hoc_sinh  $hs
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(request()->ajax())
        {
            $data = hoc_sinh::findOrFail($id);
            return response()->json(['result' => $data]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\hoc_sinh  $hs
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules = array(
            'ho_ten'    =>  'required',
            'id_lop' =>  'required',
            'id_hocky' =>  'required',
            'ngay_sinh'=>  'required',
            'dia_chi'     =>  'required',
            'musername'    =>  'required',
            'password'   => 'required'
        );

        $error = Validator::make($request->all(), $rules);

        if($error->fails())
        {
            return response()->json(['errors' => $error->errors()->all()]);
        }

        $form_data = array(
            'ho_ten'        =>  $request->ho_ten,
            'id_lop'     =>  $request->id_lop,
            'id_hocky'     =>  $request->id_hocky,
            'ngay_sinh'    =>  $request->ngay_sinh,
            'dia_chi'         =>  $request->dia_chi,
            'username'        =>  $request->username,
            'password'        =>  $request->password
        );

        hoc_sinh::whereId($request->hidden_id)->update($form_data);

        return response()->json(['success' => 'Data is successfully updated']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\hoc_sinh  $hs
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $data = hoc_sinh::find($id);
        $data->delete();
        return redirect('QuanTri');
    }

}
