<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class mon_hoc extends Model
{
    //
    protected $table = 'mon_hocs';
    // protected $monhoc = ['ten','so_tietLT','so_tietTH'];
    public function diem()
    {
        return $this->hasOne('App\diem', 'id_monhoc', 'id');
    }
    public function baitap()
    {
        return $this->hasMany('App\bai_tap', 'id_monhoc', 'id');
    }
}
