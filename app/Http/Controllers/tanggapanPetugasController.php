<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class tanggapanPetugasController extends Controller
{
    // petugas
    function tampilDataPetugas(){
        $result = DB::table('pengaduan')
            ->join('masyarakat', 'pengaduan.nik', '=', 'masyarakat.nik')
            ->select('masyarakat.username', 'pengaduan.id_pengaduan', 'pengaduan.isi_laporan', 'pengaduan.status')
            ->get();
        return view('/petugas/tanggapanPetugas', [
            'results' => $result
        ]);
    }

    function tampilTanggapan(){
        return view('/petugas/memberiTanggapanPetugas');
    }

    function tanggapi() {
        return view('/petugas/memberiTanggapanPetugas');
    }

    function memberikanTanggapan(Request $request, $id_pengaduan){
        // validasi
        $request->validate([
            'tanggapan' => 'required'
        ]);

        $user = Auth::guard('petugas')->user();

        if ($user && $user->level === 'petugas') {
            $tanggapan = $request->tanggapan;
            $id_petugas = $user->id;

            DB::table('tanggapan')
                ->join('pengaduan', 'tanggapan.id_pengaduan', '=', 'pengaduan.id_pengaduan')
                ->where('id_pengaduan', $id_pengaduan)
                ->insert([
                    'id_pengaduan' => $id_pengaduan,
                    'tgl_tanggapan' => date('Y-m-d'),
                    'tanggapan' => $tanggapan,
                    'id_petugas' => $id_petugas
                ]);

            return redirect('/verifikasiPetugas');
        }
        return redirect('/loginPetugas');
    }
}
