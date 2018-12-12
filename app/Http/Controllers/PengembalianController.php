<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\pengembalian;
use Excel;
use App\barang;
use App\Anggota;
use PDF;
class PengembalianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pengembalians = pengembalian::all();
        return view('pengembalian.index', compact('pengembalians'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    }
    public function export()
    {
        return view('pengembalian.export');
    }

    public function exportPost(Request $request)
    {
        // validasi
$this->validate($request, [
    'tgl'=>'required',
    ], [
    'tgl.required'=>'Anda belum memilih barang. Pilih minimal 1 pengembalian.'
    ]);
    $barangs = barang::whereIn('id', $request->get('tgl'))->get();

    $handler = 'export' . ucfirst($request->get('type'));
    return $this->$handler($pengembalians);
    }

    private function exportXls($pengembalians)
    {
    Excel::create('Data Pengembalian Barang Perkakas', function($excel) use ($pengembalians) {
    // Set property
    $excel->sheet('Data Pengembalian', function($sheet) use ($pengembalians) {
        $row = 1;
        $sheet->row($row, [
            'Nama',
            'Barang Yang Dipinjam',
            'Jumlah  Barang Yang Dipinjam',
            'Tanggal Peminjaman'
        ]);
    foreach ($pengembalians as $pengembalian) {
    $sheet->row(++$row, [
    $pengembalian->Nama,
    $pengembalian->BarangYangDipinjam,
    $pengembalian->JumlahBarangYangDipinjam,
    $pengembalian->TanggalPeminjaman
    ]);
    }
    });
    })->export('xls');
    }
    private function exportPdf($pengembalians)
    {
    $pdf = PDF::loadview('pdf.pengembalians', compact('pengembalians'));
    return $pdf->download('pengembalians.pdf');
    }
}
    
