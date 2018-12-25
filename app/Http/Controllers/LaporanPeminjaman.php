<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Peminjaman;
use PDF;
use DateTime;

class LaporanPeminjaman extends Controller
{
    //
    public function index()
    {
        //
        $peminjaman = Peminjaman::all();
        return view('laporan.peminjaman', compact('peminjaman'));
    }

    public function index1(Request $request)
    {
        //
        $dari = $request->dari;
        $sampai = $request->sampai;
        $peminjaman = Peminjaman::whereBetween('created_at', [$dari, $sampai])->get();
        return view('laporan.peminjaman1', compact('peminjaman','dari','sampai'));
    }

    public function index2(Request $request)
    {   
        $dari = $request->dari;
        $sampai = $request->sampai;
        $peminjaman = Peminjaman::whereBetween('created_at', [$dari, $sampai])->get();
        $pdf = PDF::loadView('laporan/peminjaman2', compact('peminjaman','dari','sampai'));
        return $pdf->download('Laporan Peminjaman.pdf');
    }
}
