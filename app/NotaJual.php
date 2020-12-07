<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NotaJual extends Model
{
    //
    protected $table = 'notajuals';

    public function users(){
        return $this->belongsTo('App\User','user_id');
    }
    public function pelanggan(){
        return $this->belongsTo('App\Pelanggan','pelanggan_id');
    }
    public function barangs(){
        return $this->belongsToMany('App\Barang','notajualdetil','notajual_id','barang_id')->withPivot('jumlah', 'harga','hargamodal')->as('notajualdetil');
    }
}
