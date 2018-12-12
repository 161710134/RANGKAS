<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Anggota;
use PDF;
use DateTime;

class LaporanAnggota extends Controller
{
    //
    public function index()
    {
        //
        $anggota = Anggota::all();
        return view('laporan.anggota', compact('anggota'));
    }

    public function index1(Request $request)
    {
        //
        $dari = $request->dari;
        $sampai = $request->sampai;
        $anggota = Anggota::whereBetween('created_at', [$dari, $sampai])->get();
        return view('laporan.anggota1', compact('anggota','dari','sampai'));
    }

    public function index2(Request $request)
    {   
        $dari = $request->dari;
        $sampai = $request->sampai;
        $anggota = Anggota::whereBetween('created_at', [$dari, $sampai])->get();
        $pdf = PDF::loadView('laporan/anggota2', compact('anggota','dari','sampai'));
        return $pdf->download('Laporan Anggota.pdf');
    }
}
