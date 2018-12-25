<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\barang;
use App\User;
use File;
use Session;
use Excel;
use PDF;
class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $barangs = barang::paginate(10);
        return view('barang.index', compact('barangs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('barang.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nama'=>'required|max:255|unique:barangs',
            'stok'=>'required|max:255',
            'keadaan'=>'required|max:255',
            'gambar' => 'required|unique:barangs'
            
        ]);

        $barangs = new barang;
        $barangs->nama = $request->nama;
        $barangs->stok = $request->stok;
           $barangs->keadaan = $request->keadaan;
        $barangs->gambar = $request->gambar;
        // upload gambar 
        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $destinationPatch = public_path().'/assets/img/gambar/';
            $filename = str_random(6).'_'.$file->getClientOriginalName();
            $uploadSucces = $file->move($destinationPatch, $filename);
            $barangs->gambar = $filename;
        }
        $barangs->save();
        Session::flash("flash_notification", [
            "level"=>"success",
            "message"=>"Berhasil menyimpan $barangs->nama"
            ]);
        return redirect()->route('barang.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $barangs = barang::findOrFail($id);
        return view('barang.edit', compact('barangs'));
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
        $this->validate($request, [
            'nama'=>'required|max:255',
            'stok'=>'required|max:255',
             'keadaan'=>'required|max:255',
            'gambar' => ''
        ]);

        $barangs = barang::findOrFail($id);
        $barangs->nama = $request->nama;
        $barangs->stok = $request->stok;
        $barangs->keadaan = $request->keadaan;
        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $destinationPatch = public_path().'/assets/img/gambar/';
            $filename = str_random(6).'_'.$file->getClientOriginalName();
            $uploadSucces = $file->move($destinationPatch, $filename);
            $barangs->gambar = $filename;

            // hapus gambar lama, jika ada
        if ($barangs->gambar) { 
        $old_gambar = $barangs->gambar;
        $filepath = public_path() . DIRECTORY_SEPARATOR . '/assets/img/gambar'
        . DIRECTORY_SEPARATOR . $barangs->gambar;
            try {
            File::delete($filepath);
            } catch (FileNotFoundException $e) {
        // File sudah dihapus/tidak ada
            }
        }
        $barangs->gambar = $filename;
    }
        $barangs->stok = $request->stok;
        $barangs->save();
        Session::flash("flash_notification", [
            "level"=>"warning",
            "message"=>"Selesai Mengedit <b>$barangs->nama</b>"
            ]);
        return redirect()->route('barang.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $barangs = barang::findOrFail($id);
            if ($barangs->gambar) {
                $old_foto = $barangs->gambar;
                $filepath = public_path(). DIRECTORY_SEPARATOR . 'assets/img/gambar/' . DIRECTORY_SEPARATOR . $barangs->gambar;
                try{
                    File::delete($filepath);
                } catch (FileNotFoundException $e){
                    // file sudah dihapus
                }
            }
        $barangs->delete();
        return redirect()->route('barang.index');
    }
}