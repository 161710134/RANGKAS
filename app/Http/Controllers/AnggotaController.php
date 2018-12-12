<?php

namespace App\Http\Controllers;

use App\Anggota;
use Session;
use Illuminate\Http\Request;

class AnggotaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $anggota = Anggota::all();
        return view('anggota.index',compact('anggota'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('anggota.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        for($id = 0; $id < count($request->nama); $id++){
            $anggota = new Anggota;
            $anggota->nama = $request->nama[$id];
            $anggota->jk = $request->jk[$id];
            $anggota->nope = $request->nope[$id];
            $anggota->alamat = $request->alamat[$id];
            $anggota->save();
            }
            Session::flash("flash_notification", [
                "level"=>"success",
                "message"=>"Berhasil menyimpan $anggota->nama"
                ]);
        return redirect()->route('anggota.index');

        //$this->validate($request,[
          //  'nama' => 'required|',
            //'jk' => 'required|',
            //'nope' => 'required|',
            //'alamat' => 'required|'
        //]);
        //$anggota = new Anggota;
        //$anggota->nama = $request->nama;
       // $anggota->jk = $request->jk;
       // $anggota->nope = $request->nope;
       // $anggota->alamat = $request->alamat;
       // $anggota->save();
        //return redirect()->route('anggota.index');
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
        //
        $anggota = Anggota::findOrFail($id);
        return view('anggota.edit',compact('anggota'));
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
        //
        $this->validate($request,[
            'nama' => 'required|',
            'jk' => 'required|',
            'nope' => 'required|',
            'alamat' => 'required|'
        ]);
        $anggota = Anggota::findOrFail($id);
        $anggota->nama = $request->nama;
        $anggota->jk = $request->jk;
        $anggota->nope = $request->nope;
        $anggota->alamat = $request->alamat;
        $anggota->save();
        Session::flash("flash_notification", [
            "level"=>"warning",
            "message"=>"Selesai Mengedit <b>$anggota->nama</b>"
            ]);
        return redirect()->route('anggota.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $anggota = Anggota::findOrFail($id);
        $anggota->delete();
        return redirect()->route('anggota.index');
    }
}
