<?php

namespace App\Http\Controllers;

use App\giao_vien;
use Illuminate\Http\Request;
use DataTables;
use Validator;

class QuanTriController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->ajax())
        {
            $data = giao_vien::latest()->get();
            return DataTables::of($data)
                    ->addColumn('action', function($data){
                        $button = '<button type="button" name="edit" id="'.$data->id.'" class="edit btn btn-primary btn-sm">Edit</button>';
                        $button .= '&nbsp;&nbsp;&nbsp;<button type="button" name="edit" id="'.$data->id.'" class="delete btn btn-danger btn-sm">Delete</button>';
                        return $button;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        $giaovien = giao_vien::all();
        return view('QuanTri', ['giaovien' => $giaovien]);
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
            'ngay_sinh' =>  'required',
            'gioi_tinh' =>  'required',
            'dien_thoai'=>  'required',
            'email'     =>  'required',
            'bo_mon'    =>  'required'
        );
        $this->validate($request, [], []);
        $error = Validator::make($request->all(), $rules);

        if($error->fails())
        {
            return response()->json(['errors' => $error->errors()->all()]);
        }

        $form_data = array(
            'ho_ten'        =>  $request->ho_ten,
            'ngay_sinh'     =>  $request->ngay_sinh,
            'gioi_tinh'     =>  $request->gioi_tinh,
            'dien_thoai'    =>  $request->dien_thoai,
            'email'         =>  $request->email,
            'bo_mon'        =>  $request->bo_mon
        );

        giao_vien::create($form_data);

        return response()->json(['success' => 'Data Added successfully.']);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\giao_vien  $giaovien
     * @return \Illuminate\Http\Response
     */
    public function show(giao_vien $giaovien)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\giao_vien $giaovien
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(request()->ajax())
        {
            $data = giao_vien::findOrFail($id);
            return response()->json(['result' => $data]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\giao_vien $giaovien
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, giao_vien $giaovien)
    {
        $rules = array(
            'ho_ten'        =>  'required',
            'ngay_sinh'     =>  'required',
            'gioi_tinh'     =>  'required',
            'dien_thoai'    =>  'required',
            'email'         =>  'required',
            'bo_mon'        =>  'required'
        );

        $error = Validator::make($request->all(), $rules);

        if($error->fails())
        {
            return response()->json(['errors' => $error->errors()->all()]);
        }

        $form_data = array(
            'ho_ten'    =>  $request->ho_ten,
            'ngay_sinh' =>  $request->ngay_sinh,
            'gioi_tinh' =>  $request->gioi_tinh,
            'dien_thoai'=>  $request->dien_thoai,
            'email'     =>  $request->email,
            'bo_mon'    =>  $request->bo_mon
        );

        giao_vien::whereId($request->hidden_id)->update($form_data);

        return response()->json(['success' => 'Data is successfully updated']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\giao_vien  $giaovien
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $data = giao_vien::find($id);
        $data->delete();
        return redirect('QuanTri');
    }
}
