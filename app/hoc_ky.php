<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class hoc_ky extends Model
{
    //
    // protected $guarded =  [ ];
    protected $table = 'hoc_kies';
    // protected $hocky = ['ten_hoc_ky','nien_khoa'];

    public function diem()
    {
        return $this->hasMany('App\diem', 'id_hocky', 'id');
    }
    public function hanhkiem()
    {
        return $this->hasMany('App\hanhkiem', 'id_hocky', 'id');
    }
    public function hocbong()
    {
        return $this->hasMany('App\hoc_bong', 'id_hocky', 'id');
    }
    public function hocsinh()
    {
        return $this->hasMany('App\hoc_sinh', 'id_hocky', 'id');
    }
}
