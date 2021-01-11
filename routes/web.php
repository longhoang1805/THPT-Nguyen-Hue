<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MyController;
use App\Http\Middleware\QuanTriRole;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('send/{id}', 'KQHTController@sendmail');
// Route::get ('/', 'MyController@index');
// Route::get ('/', 'MyController@QuanTri');
//Giao dien Quan Tri
//  Route::get('QuanTri','MyController@QuanTri');
// Route::group(['prefix' => 'admin'], function () {
    Route::group(['prefix' => 'QuanTri', 'middleware' => 'loginAdmin'],function(){
        Route::get('/', function () {
            return view('QuanTri');
        });
    //Xoa
    Route::get('xoa/{id}','MyController@xoa');
    Route::get('xoa2/{id}','QuantriHocsinh@xoa');
    //Sua
    Route::get('sua/{id}','MyController@getSua');
    Route::post('sua/{id}','MyController@postSua');

    Route::get('sua2/{id}','QuantriHocsinh@getSua');
    Route::post('sua2/{id}','QuantriHocsinh@postSua');
    //Them
     Route::get('them','MyController@them');
    Route::post('them2','MyController@postthem');
    //Them hoc sinh
    Route::get('themhs','QuantriHocsinh@them');
    Route::post('themhs2','QuantriHocsinh@postthem');

    Route::resource('QuanTri', 'QuanTriController');
    Route::post('QuanTri/update', 'QuanTriController@update')->name('QuanTri.update');

    // Route::resource('QuanTriHocsinh', 'QuanTriHocsinh');
    Route::get('QuantriHocsinh/{lop}','QuantriHocsinh@QuanTriHocsinh');

    Route::post('QuanTriHocsinh/update', 'QuantriHocsinh@update');
//Thong bao
    Route::get('themthongbao', function () {
        return view('ThemThongBao2');
    });
    Route::post('postThongbao','Thongbao@create2');
    Route::get('thongbao', 'Thongbao@thongbaoquantri');
        Route::get('thongbao/{id}', 'Thongbao@chitiet3');
        Route::get('suathongbao/{id}', 'Thongbao@suathongbao2');
        Route::post('updateThongbao', 'Thongbao@updateThongbao2');
        Route::get('xoathongbao/{id}', 'Thongbao@xoathongbao2');
    });

//Giao dien Giao Vien
Route::group(['prefix' => 'giao-vien'], function () {
    Route::group(['middleware'=>'loginGiaoVien'], function () {
        Route::get('/',function(){
            return view('GiaoVien');
        });
        Route::get('themthongbao', function () {
            return view('ThemThongBao');
        });
        Route::post('postThongbao', 'Thongbao@create');
        Route::get('xoathongbao/{id}', 'Thongbao@xoathongbao');
        Route::get('thongbaogv/{id}', 'Thongbao@chitiet2');
        Route::get('suathongbao/{id}', 'Thongbao@suathongbao');
        Route::post('updateThongbao', 'Thongbao@updateThongbao');
        Route::get('thongbaogv', 'Thongbao@thongbaogv');

        Route::get('GiaoVien','MyController@GiaoVien');
        route::get('quanlydiem', 'QuantriHocsinh@quanlydiem');
        Route::get('bangdiem', 'QuantriHocsinh@bangdiem');
        Route::get('suadiem/{id}', 'QuantriHocsinh@suadiem');
        Route::post('diem/{id}', 'QuantriHocsinh@diem');
    });

});

//Giao dien Hoc Sinh

Route::group(['prefix' => 'hoc-sinh','middleware'=>'loginHocsinh'], function () {
    Route::get('profile', 'MyController@profile');
    Route::get('bangdiem/{ky}','MyController@bangdiem');
    Route::get('thongbao/{id}','Thongbao@chitiet');
    Route::get('thongbao','Thongbao@thongbao');
    Route::get('hanhkiem','MyController@hanhkiem');
});




// Route::resource('giaovien', 'MyController');
Route::get('thongbao1/{id}', 'MyController@destroy');

Route::get('Dangnhap','MyController@getDangnhap')->name('dangnhap');
Route::post('Dangnhap','MyController@postDangnhap');

//Dang xuat
Route::get('dangxuat', 'MyController@logout')->name('dangxuat');
