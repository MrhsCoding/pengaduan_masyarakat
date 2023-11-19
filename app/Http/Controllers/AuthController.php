<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class AuthController extends Controller
{
    function register() {
        return view('/masyarakat/register');
    }

    function store(Request $request){
        
        $data = DB::table('masyarakat')->insert([
            'nik' => $request->nik,
            'nama' => $request->nama,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'telp' => $request->telp,
        ]);
        return redirect('/login');
    }

    function regPetgs() {
        return view('/petugas/registerPetugas');
    }

    function regPetugas(Request $request){
        // Validate the form data
        $request->validate([
            'nama_petugas' => 'required',
            'username' => 'required|unique:petugas,username',
            'password' => 'required',
            'tlp' => 'required',
        ]);
    
        // Attempt to insert data into the database
        $data = DB::table('petugas')->insert([
            'nama_petugas' => $request->nama_petugas,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'tlp' => $request->tlp,
            'level' => 'petugas'
        ]);

        if ($data){
            return redirect('/registerPetugas')->with("success", "Petugas Berhasil Ditambahkan");
        } else{
            return redirect('/registerPetugas')->with("error", "Petugas Gagal Ditambahkan");
        }
    }   
}