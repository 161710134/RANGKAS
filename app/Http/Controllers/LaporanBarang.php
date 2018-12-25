<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Barang;
use PDF;
use DateTime;

class LaporanBarang extends Controller
{
    //
    public function index()
    {
        //
        $barang = Barang::all();
        return view('laporan.barang', compact('barang'));
    }

    public function index1(Request $request)
    {
        //
        $dari = $request->dari;
        $sampai = $request->sampai;
        $barang = Barang::whereBetween('created_at', [$dari, $sampai])->get();
        return view('laporan.barang1', compact('barang','dari','sampai'));
    }

    public function index2(Request $request)
    {   
        $dari = $request->dari;
        $sampai = $request->sampai;
        $barang = Barang::whereBetween('created_at', [$dari, $sampai])->get();
        $pdf = PDF::loadView('laporan/barang2', compact('barang','dari','sampai'));
        return $pdf->download('Laporan Barang.pdf');
    }
}
