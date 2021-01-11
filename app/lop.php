<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class lop extends Model
{
    //
    // protected $guarded =  [ ];
    protected $table = 'lops';
    public function giaovien()
    {
        return $this->belongsTo('App\giao_vien', 'id_giaovien', 'id');
    }
    public function hocsinh()
    {
        return $this->hasMany('App\hoc_sinh','id_lop','id');
    }
}
