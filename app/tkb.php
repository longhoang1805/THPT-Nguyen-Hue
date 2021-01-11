<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tkb extends Model
{
    //
    public function monhoc()
    {
        return $this->belongsTo('App\mon_hoc', 'id_monhoc', 'id');
    }
    public function giaovien()
    {
        return $this->belongsTo('App\giao_vien', 'id_giaovien', 'id');
    }
    public function lichday()
    {
        return $this->hasOne('App\lich_day', 'id_tkb', 'id');
    }
}
