<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;

class giao_vien extends Model implements AuthenticatableContract
{
    //
    use AuthenticableTrait;
    // protected $table = 'giao_viens';
    protected $giaovien = ['ho_ten','ngay_sinh','gioi_tinh','dien_thoai','email','bo_mon','username','password'];
    public function lop()
    {
        return $this->hasOne('App\lop', 'id_giaovien', 'id');
    }

}
