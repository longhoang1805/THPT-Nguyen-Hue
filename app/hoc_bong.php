<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class hoc_bong extends Model
{
    //
    public function hocsinh()
    {
        return $this->belongsTo('App\hoc_sinh', 'id_hocsinh', 'id');
    }
    public function diem()
    {
        return $this->belongsTo('App\diem', 'id_diem', 'id');
    }
    public function hocky()
    {
        return $this->belongsTo('App\hoc_ky', 'id_hocky', 'id');
    }
}
