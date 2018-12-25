<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pengembalian;
use PDF;
use DateTime;

class LaporanPengembalian extends Controller
{
    //
    public function index()
    {
        //
        $pengembalian = Pengembalian::all();
        return view('laporan.pengembalian', compact('pengembalian'));
    }

    public function index1(Request $request)
    {
        //
        $dari = $request->dari;
        $sampai = $request->sampai;
        $pengembalian = Pengembalian::whereBetween('created_at', [$dari, $sampai])->get();
        return view('laporan.pengembalian1', compact('pengembalian','dari','sampai'));
    }

    public function index2(Request $request)
    {   
        $dari = $request->dari;
        $sampai = $request->sampai;
        $pengembalian = Pengembalian::whereBetween('created_at', [$dari, $sampai])->get();
        $pdf = PDF::loadView('laporan/pengembalian2', compact('pengembalian','dari','sampai'));
        return $pdf->download('Laporan Pengembalian.pdf');
    }
}
