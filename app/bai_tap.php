<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class bai_tap extends Model
{
    //

    public function monhoc()
    {
        return $this->belongsTo('App\mon_hoc', 'id_monhoc', 'id');
    }
}
