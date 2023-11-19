<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class loginController extends Controller
{
    function login() {
        return view('/masyarakat/login');
    }

    function prosesLogin(Request $request) {
        $data_login = $request->only('username', 'password');
        $masuk = Auth::attempt($data_login);
        if($masuk){
            return redirect('/laporan');
        }else{
            return redirect('/login')->with("error", "username atau password salah");
        }
    }

    function logPetgs() {
        return view('/petugas/loginPetugas');
    }
    
    function logPetugas(Request $request) {
        $data = $request->only('username', 'password');
        if (Auth::guard('petugas')->attempt($data)) {
            $user = Auth::guard('petugas')->user();
    
            // Check the level of the authenticated user
            if ($user->level === 'petugas') {
                return redirect('/detailLaporanPetugas');
            } elseif ($user->level === 'admin') {
                return redirect('/home');
            }
        }
        return redirect("/loginPetugas")->with("error", "username atau password salah");
    }    
}