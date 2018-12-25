<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePengembaliansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengembalians', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedinteger('id_anggota');
            $table->foreign('id_anggota')->references('id')->on('anggotas')->OnDelete('CASCADE');
            $table->unsignedinteger('id_barang');
            $table->foreign('id_barang')->references('id')->on('barangs')->OnDelete('CASCADE');
            $table->integer('jumlah');
            $table->datetime('tgl_pinjam');
            $table->datetime('tanggal_batas');
            $table->datetime('tanggal_kembali');
            $table->string('denda');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pengembalians');
    }
}
