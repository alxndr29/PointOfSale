<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    //
    public function notajuals(){
        return $this->hasMany('App\NotaJual','pelanggan_id');
    }
}
