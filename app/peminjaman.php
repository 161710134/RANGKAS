<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class peminjaman extends Model
{
    protected $table = 'peminjamans';
    protected $fillable = ['id_anggota','id_barang','jumlah' ,'tanggal_batas'];
    public $timestamps = true;
    
    public function barang(){
        return $this->belongsTo('App\barang','id_barang');
    }
    public function anggota(){
        return $this->belongsTo('App\Anggota','id_anggota');
    }
}
