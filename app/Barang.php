<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    //
    protected $table = 'barangs';
    
    public function notajuals(){
        return $this->belongsToMany('App\NotaJual','notajualdetil','notajual_id','barang_id')->withPivot('jumlah', 'harga')->as('notajualdetil');
    }
}
