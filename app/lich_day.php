<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class lich_day extends Model
{
    //
    public function tkb()
    {
        return $this->belongsTo('App\tkb', 'id_tkb', 'id');
    }
}
