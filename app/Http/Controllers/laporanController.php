<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class laporanController extends Controller
{
    function tampilData(){
        return view('/masyarakat/laporan');
    }

    function tambahPengaduan(Request $request){
        // validasi
        $request->validate([
            'isi_laporan' => 'required',
            'foto' => 'required'
        ]);
        // Ambil nama foto
        $namaFoto = $request->foto->getClientOriginalName();
        // Untuk menyinpan foto ke dalam storage/public/image
        $request->foto->storeAs('public/img', $namaFoto);
        $isi_pengaduan = $request->isi_laporan;
        DB::table('pengaduan')->insert([
            'tgl_pengaduan' => date('Y-m-d'),
            'nik' => Auth::user()->nik,
            // 'nik' => '1',
            'isi_laporan' => $isi_pengaduan,
            'foto' => $namaFoto,
            'status' => '0'
        ]);
        return redirect('/detailLaporan');
    }
}