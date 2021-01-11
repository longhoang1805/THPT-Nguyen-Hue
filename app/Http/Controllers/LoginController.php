<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Session;
class LoginController extends Controller
{
    //
    public function postLogin(Request $request){
        $rules = [
            'username' => 'required',
            'password' => 'required'
        ];
        $validator = Validator::make($request->all(), $rules);
        if($validator->fails()){
            return redirect('login')->withErrors($validator)->withInput();
        } else {
            $username  = $request->input('username');
            $password  = $request->input('password');
            if(Auth::attempt(['username' => $username, 'password' => $password])){
                return redirect('HocSinh');
            } else {
                $request->session()->flash('error', 'pass ko dung');
                return redirect('Dangnhap');
            }
        }
    }
}
