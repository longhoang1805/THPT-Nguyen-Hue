<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class diem extends Model
{
    //
    protected $table = 'diems';
    // protected $diem = ['id_hocsinh','id_monhoc','id_hocky','diem_mieng','diem_15p1','diem_15p2','diem_15p3','diem_1tiet','diem_cuoiky','diem_tbmon'];

    public function hocsinh()
    {
        return $this->belongsTo('App\hoc_sinh', 'id_hocsinh', 'id');
    }
    public function hocky()
    {
        return $this->belongsTo('App\hoc_ky', 'id_hocky', 'id');
    }
    public function monhoc()
    {
        return $this->belongsTo('App\mon_hoc', 'id_monhoc', 'id');
    }
    public function hocbong()
    {
        return $this->hasOne('App\hoc_bong', 'id_diem', 'id');
    }
}
