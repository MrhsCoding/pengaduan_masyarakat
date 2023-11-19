<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class tanggapanController extends Controller
{
    // masyarakat
    function tampilData(){
        $result = DB::table('pengaduan')
            ->join('tanggapan', 'pengaduan.id_pengaduan', '=', 'tanggapan.id_pengaduan')
            ->join('petugas', 'tanggapan.id_petugas', '=', 'petugas.id')
            ->join('masyarakat', 'pengaduan.nik', '=', 'masyarakat.nik')
            ->select(
                'tanggapan.id_tanggapan',
                'pengaduan.id_pengaduan',
                'tanggapan.tgl_tanggapan',
                'tanggapan.tanggapan',
                'pengaduan.isi_laporan',
                'petugas.nama_petugas',
                'masyarakat.username'
            )
            ->where('masyarakat.nik', Auth::user()->nik)->get();
        return view('/masyarakat/tanggapan', [
            'results' => $result
        ]);
    }

    // admin
    function tampilDataAdmin(){
        $result = DB::table('pengaduan')
            ->join('masyarakat', 'pengaduan.nik', '=', 'masyarakat.nik')
            ->select('masyarakat.username', 'pengaduan.id_pengaduan', 'pengaduan.isi_laporan', 'pengaduan.status')
            ->get();
        return view('/admin/tanggapanAdmin', [
            'results' => $result
        ]);
    }

    function tanggapiAdmin() {
        return view('/admin/memberiTanggapanAdmin');
    }

    function memberikanTanggapanAdmin(Request $request, $id_pengaduan){
        // validasi
        $request->validate([
            'tanggapan' => 'required'
        ]);
        $tanggapan = $request->tanggapan;
        $id_petugas = Auth::guard('petugas')->user()->id;
        DB::table('tanggapan')->join('pengaduan', 'tanggapan.id_pengaduan', '=', 'pengaduan.id_pengaduan')->where('id_pengaduan', $id_pengaduan)->insert([
            'id_pengaduan' => $id_pengaduan,
            'tgl_tanggapan' => date('Y-m-d'),
            'tanggapan' => $tanggapan,
            'id_petugas' => $id_petugas
        ]);
        return redirect('/verifikasiAdmin');
    }
}