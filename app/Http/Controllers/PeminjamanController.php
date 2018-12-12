<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Anggota;
use App\barang;
use App\peminjaman;
use App\pengembalian;
use Session;

class PeminjamanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $peminjamans = peminjaman::with('Anggota','barang')->get();
        return view('peminjaman.index', compact('peminjamans'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $barangs = barang::all();
        $anggota = Anggota::all();
        return view('peminjaman.create', compact('barangs','anggota'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        for($id = 0; $id < count($request->id_anggota); $id++){
            $peminjamans = new peminjaman;
            $peminjamans->id_anggota = $request->id_anggota[$id];
            $peminjamans->id_barang = $request->id_barang[$id];
            $peminjamans->jumlah = $request->jumlah[$id];
        
            $barangs = barang::findOrFail($request->id_barang[$id]);
            $barangs->stok = $barangs->stok - $request->jumlah[$id]; 
            $barangs->save();
            $peminjamans->save();
            }
            Session::flash("flash_notification", [
                "level"=>"success",
                "message"=>"Berhasil menyimpan data peminjaman"
                ]);
        return redirect()->route('peminjaman.index');


        //$this->validate($request, [
          //  'id_anggota' => 'required|max:255',
            //'id_barang' => 'required|max:255',
            //'jumlah'=>'required|max:255',
        //]);

        //$peminjamans = new peminjaman;
        //$peminjamans->id_anggota = $request->id_anggota;
        //$peminjamans->id_barang = $request->id_barang;
        //$peminjamans->jumlah = $request->jumlah;

        //$barangs = barang::findOrFail($peminjamans->id_barang);
        //$barangs->stok = $barangs->stok - $request->jumlah;
        //$barangs-> save();
        //$peminjamans->save();
        //return redirect()->route('peminjaman.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $peminjamans = peminjaman::findOrFail($id);
        $anggota = Anggota::all();
        $barangs = barang::all();
        $selectedAnggota = peminjaman::findOrFail($id)->id_anggota;
        $selectedbarangs = peminjaman::findOrFail($id)->id_barang;
        return view('peminjaman.show' ,compact('peminjamans','anggota','barangs','selectedAnggota','selectedbarangs'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $peminjamans = peminjaman::findOrFail($id);
        $anggota = Anggota::all();
        $selectanggota = peminjaman::findOrFail($id)->id_anggota;
        $barangs = barang::all();
        $selectbarangs = peminjaman::findOrFail($id)->id_barang;
        return view('peminjaman.edit', compact('peminjamans','anggota','selectanggota','barangs','selectbarangs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $pengembalians = new pengembalian;
        $pengembalians->id_anggota = $request->id_anggota;
        $pengembalians->id_barang = $request->id_barang;
        $pengembalians->jumlah = $request->jumlah;
        $pengembalians->tgl_pinjam = $request->tgl_pinjam;
        $pengembalians->save();

        $peminjamans = peminjaman::findOrFail($id);
        $barangs = barang::findOrFail($request->id_barang);
        $barangs->stok = $barangs->stok + $request->jumlah;

        $barangs->save();
        $peminjamans->delete();
        $pengembalians->save();

        return redirect()->route('pengembalian.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $peminjamans = peminjaman::findOrFail($id);
        $peminjamans->delete();
        return redirect()->route('peminjaman.index');

    }
}
