<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class verifikasiController extends Controller
{
    // admin
    function verifikasiAdmin(){
        $result = DB::table('pengaduan')
            ->join('tanggapan', 'pengaduan.id_pengaduan', '=', 'tanggapan.id_pengaduan')
            ->join('masyarakat', 'pengaduan.nik', '=', 'masyarakat.nik')
            ->select('masyarakat.username', 'pengaduan.isi_laporan', 'pengaduan.status', 'tanggapan.tanggapan')
            ->get();
        return view('/admin/verifikasiAdmin', [
            'results' => $result
        ]);
    }

    function tampilVerifikasiAdmin($id_pengaduan){
        $result = DB::table('pengaduan')->where('id_pengaduan', $id_pengaduan)->first();
        return view('admin\memberiVerifikasi', [
            "result" => $result,
        ]);
    }

    function ubahStatusAdmin($id_pengaduan, Request $request){
        $status = $request->status;
        DB::table('pengaduan')
        ->where('id_pengaduan', $id_pengaduan)
        ->update([
            'status' => $status
        ]);
        return redirect('/tanggapanAdmin');
    }

    // petugas
    function verifikasiPtgs(){
        $result = DB::table('pengaduan')
            ->join('tanggapan', 'pengaduan.id_pengaduan', '=', 'tanggapan.id_pengaduan')
            ->join('masyarakat', 'pengaduan.nik', '=', 'masyarakat.nik')
            ->select('masyarakat.username', 'pengaduan.isi_laporan', 'pengaduan.status', 'tanggapan.tanggapan')
            ->get();
        return view('/petugas/verifikasiPetugas', [
            'results' => $result
        ]);
    }

    function tampilVerifikasi($id_pengaduan){
        $result = DB::table('pengaduan')->where('id_pengaduan', $id_pengaduan)->first();
        return view('petugas\memberiVerifikasi', [
            "result" => $result,
        ]);
    }

    function ubahStatus($id_pengaduan, Request $request){
        $status = $request->status;
        DB::table('pengaduan')
        ->where('id_pengaduan', $id_pengaduan)
        ->update([
            'status' => $status
        ]);
        return redirect('/verifikasiPetugas');
    }

    // masyarakat
    function verifikasi(){
        $result = DB::table('pengaduan')
            ->join('masyarakat', 'pengaduan.nik', '=', 'masyarakat.nik')
            ->join('tanggapan', 'pengaduan.id_pengaduan', '=', 'tanggapan.id_pengaduan')
            ->join('petugas', 'tanggapan.id_petugas', '=', 'petugas.id')
            ->select('masyarakat.username', 'pengaduan.isi_laporan', 'pengaduan.status', 'petugas.nama_petugas')
            ->where('masyarakat.nik', Auth::user()->nik)->get();
        return view('/masyarakat/verifikasi', [
            'results' => $result
        ]);
    }
}