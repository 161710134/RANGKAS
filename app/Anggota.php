<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Anggota extends Model
{
    //
    protected $table = 'anggotas'; 
    protected $fillable = ['nama','jk','nope','alamat'];
    public $timestamps = true;
}
