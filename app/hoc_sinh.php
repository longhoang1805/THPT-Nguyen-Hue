<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;
class hoc_sinh extends Model implements AuthenticatableContract
{
    use AuthenticableTrait;
    //
    protected $guarded = [ ];
    protected $hocsinh= ['ho_ten','id_lop','id_hocky','ngay_sinh','dia_chi','username','password','level'];

    public function lop()
    {
        return $this->belongsTo('App\lop', 'id_lop', 'id');
    }
    public function hocky()
    {
        return $this->belongsTo('App\hoc_ky', 'id_hocky', 'id');
    }
    public function diem()
    {
        return $this->hasMany('App\diem', 'id_hocsinh', 'id');
    }
    public function hanhkiem()
    {
        return $this->hasOne('App\hanh_kiem', 'id_hocsinh', 'id');
    }
    public function hocbong()
    {
        return $this->hasMany('App\hoc_bong', 'id_hocsinh', 'id');
    }
}
