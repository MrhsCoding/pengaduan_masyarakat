<?php

namespace App\Http\Controllers;

use App\Models\pengaduan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class detailLaporanController extends Controller
{
    // admin
    function tampilAdmin(){
        return view('/home');
    }

    function tampilDataAdmin(){
        $result = DB::table('pengaduan')
            ->join('masyarakat', 'pengaduan.nik', '=', 'masyarakat.nik')
            ->select('masyarakat.username', 'pengaduan.id_pengaduan', 'pengaduan.tgl_pengaduan', 'pengaduan.nik', 'pengaduan.isi_laporan', 'pengaduan.foto', 'pengaduan.status')
            ->get();
        return view('/admin/detailLaporanAdmin', [
            'results' => $result
        ]);
    }

    function detailAdmin($id_pengaduan){
        // $result = DB::table('pengaduan')->where('id_pengaduan', $id_pengaduan)->first();
        $result = DB::table('pengaduan')
            ->join('masyarakat', 'pengaduan.nik', '=', 'masyarakat.nik')
            ->where('pengaduan.id_pengaduan', $id_pengaduan)
            ->first();
        return view('/admin/detailAdmin', [
            "result" => $result
        ]);
    }

    //petugas
    function tampilDataPetugas(){
        $result = DB::table('pengaduan')
            ->join('masyarakat', 'pengaduan.nik', '=', 'masyarakat.nik')
            ->select('masyarakat.username', 'pengaduan.id_pengaduan', 'pengaduan.tgl_pengaduan', 'pengaduan.nik', 'pengaduan.isi_laporan', 'pengaduan.foto', 'pengaduan.status')
            ->get();
        return view('/petugas/detailLaporanPetugas', [
            'results' => $result
        ]);
    }

    function detailPetugas($id_pengaduan){
        // $result = DB::table('pengaduan')->where('id_pengaduan', $id_pengaduan)->first();
        $result = DB::table('pengaduan')
            ->join('masyarakat', 'pengaduan.nik', '=', 'masyarakat.nik')
            ->where('pengaduan.id_pengaduan', $id_pengaduan)
            ->first();
        return view('/petugas/detailPetugas', [
            "result" => $result
        ]);
    }

    // masyarakat
    function tampilData(){
        $result = DB::table('pengaduan')
            ->join('masyarakat', 'pengaduan.nik', '=', 'masyarakat.nik')
            ->select('masyarakat.username', 'pengaduan.id_pengaduan', 'pengaduan.tgl_pengaduan', 'pengaduan.nik', 'pengaduan.isi_laporan', 'pengaduan.foto', 'pengaduan.status')
            ->where('masyarakat.nik', Auth::user()->nik)->get();
        return view('/masyarakat/detailLaporan', [
            'results' => $result
        ]);
    }

    function tampilUbah($id_pengaduan){
        $result = DB::table('pengaduan')->where('id_pengaduan', $id_pengaduan)->first();
        return view('/masyarakat/update', [
            "result" => $result,
        ]);
    }

    function ubah($id_pengaduan, Request $request){
        $isi_laporan = $request->isi_laporan;
        $foto = $request->foto;
        DB::table('pengaduan')
        ->where('id_pengaduan', $id_pengaduan)
        ->update([
            'isi_laporan' => $isi_laporan,
            'foto' => $foto
        ]);
        return redirect('/detailLaporan');
    }

    function hapus($id_pengaduan){
        DB::table('pengaduan')->where('id_pengaduan', $id_pengaduan)->delete();
        return redirect('/detailLaporan');
    }

    function detail($id_pengaduan){
        // $result = DB::table('pengaduan')->where('id_pengaduan', $id_pengaduan)->first();
        $result = DB::table('pengaduan')
            ->join('masyarakat', 'pengaduan.nik', '=', 'masyarakat.nik')
            ->where('pengaduan.id_pengaduan', $id_pengaduan)
            ->first();
        return view('/masyarakat/detail', [
            "result" => $result
        ]);
    }

    function print($id_pengaduan){
        $result = DB::table('pengaduan')
            ->join('masyarakat', 'pengaduan.nik', '=', 'masyarakat.nik')
            ->where('pengaduan.id_pengaduan', $id_pengaduan)
            ->first();
        return view('/admin/printLaporan', [
            'result' => $result
        ]);
    }
}