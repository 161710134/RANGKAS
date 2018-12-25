<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Anggota;
use App\barang;
use App\peminjaman;
use App\pengembalian;
use DateTime;
use App\Traits\SessionFlash;
use Input;

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
        //for($id = 0; $id < count($request->id_anggota); $id++){
          //  $peminjamans = new peminjaman;
            //$peminjamans->id_anggota = $request->id_anggota[$id];
            //$peminjamans->id_barang = $request->id_barang[$id];
            //$peminjamans->jumlah = $request->jumlah[$id];
        
            //$barangs = barang::findOrFail($request->id_barang[$id]);
            //$barangs->stok = $barangs->stok - $request->jumlah[$id]; 
            //$barangs->save();
            //$peminjamans->save();
            //}
            //Session::flash("flash_notification", [
              //  "level"=>"success",
               // "message"=>"Berhasil menyimpan data peminjaman"
                //]);

                $requestFailed=array();
                $requestSuccess=array();
                for($id = 0; $id < count($request->id_barang); $id++){
                    $barangs = Barang::findOrFail($request->id_barang[$id]);
                    if ($barangs->stok < $request->jumlah[$id]) {
                        $requestFailed[]=" Maaf, ".$barangs->nama." Yang Akan Di Pinjam Hanya Tersisa ".$barangs->stok;
                    }else{
                        $peminjamans = new Peminjaman;
                        $peminjamans->id_anggota = $request->id_anggota[$id];
                        $peminjamans->id_barang = $request->id_barang[$id];
                        $peminjamans->jumlah = $request->jumlah[$id];
                        $peminjamans->tanggal_batas = $request->tanggal_batas[$id];
                        $peminjamans->save();
                    
                        $barangs->stok = $barangs->stok - $request->jumlah[$id];   
                        $barangs->save();
        
                        $requestSuccess[]=" Berhasil, Meminjam ".$barangs->nama." Dengan Jumlah ".$request->jumlah[$id];
                    }        
                }
                $message= "Rincian Peminjaman :";
                $message.= "<ul>";
                for($i=0; $i<count($requestSuccess);$i++){
                    $message.= '<li> '.$requestSuccess[$i].'</li>'; 
                }
                for($i=0; $i<count($requestFailed);$i++){
                    $message.= '<font color="red"><li>'.$requestFailed[$i].'</li></font>'; 
                }
                $message.="</ul>";
                
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

       // $pengembalians = new pengembalian;
       // $pengembalians->id_anggota = $request->id_anggota;
       // $pengembalians->id_barang = $request->id_barang;
       // $pengembalians->jumlah = $request->jumlah;
       // $pengembalians->tgl_pinjam = $request->tgl_pinjam;
       // $pengembalians->save();

       // $peminjamans = peminjaman::findOrFail($id);
       // $barangs = barang::findOrFail($request->id_barang);
       // $barangs->stok = $barangs->stok + $request->jumlah;

       // $barangs->save();
       // $peminjamans->delete();
       // $pengembalians->save();

       $pengembalians = new Pengembalian;
       $pengembalians->id_anggota = $request->id_anggota;
       $pengembalians->id_barang = $request->id_barang;
       $pengembalians->jumlah = $request->jumlah;
       $pengembalians->tgl_pinjam = $request->tgl_pinjam;
       $pengembalians->tanggal_batas = $request->tanggal_batas;
       $pengembalians->tanggal_kembali = $request->tanggal_kembali;

       $batasdate = $request->tanggal_batas;
       $kembalidate = $request->tanggal_kembali;
       $datetime1 = new DateTime($batasdate);
       $datetime2 = new DateTime($kembalidate);
       $interval = $datetime1->diff($datetime2);
       $days = $interval->format('%r%a');

       if ($days > 0) {
           $denda = $days * 2000;

           // return "Batas Waktu Peminjaman : ".$batasdate.
           // "<br> Tanggal Pengembalian : ".$kembalidate.
           // "<br> Selisih Hari : ".$days. " Hari <br> Denda : Rp. ".$denda;
       } else {
           $denda = 0;
           // return "Batas Waktu Peminjaman : ".$batasdate.
           // "<br> Tanggal Pengembalian : ".$kembalidate. 
           // "Selisih Hari : ".$days. " Hari<br>Denda : 0";
       }

       $pengembalians->denda = $denda;
       $peminjamans = Peminjaman::findOrFail($id);
       $barangs = Barang::findOrFail($request->id_barang);
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
