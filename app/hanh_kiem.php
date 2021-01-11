<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class hanh_kiem extends Model
{
    //
    public function hocsinh()
    {
        return $this->belongsTo('App\hoc_sinh', 'id_hocsinh', 'id');
    }
    public function hocky()
    {
        return $this->belongsTo('App\hoc_ky', 'id_hocky', 'id');
    }
}
