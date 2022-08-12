<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redis;

class LoginController extends Controller
{
    public function index()
    {
        return view('login/index', [
            'judul' => 'Halaman Login',
        ]);
    }

    // untuk login
    public function auth(Request $request)
    {
        $validateData = $request->validate([
            'email' => 'required|email:dns',
            'password'  => 'required'
        ]);

        // pengecekkan ada data atau tidak didalam database
        // kalau ada diredirect
        if (Auth::attempt($validateData)) {
            // ambil session
            $request->session()->regenerate();

            // redirect kalau berhasil
            return redirect()->intended('/dashboard');
        }

        // jika gagal kembali kehalam login dan
        // kirim pesan error
        return back()->with('gagal', 'Gagal Login, Periksa kembali dengan benar!!');
    }


    // fungsi untuk keluar /logout
    public function logout(Request $request)
    {
        // panggil fungsi auth:logtou untuk 
        // menghilangkan semua essiaon 
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // kembali ke halaman utama
        return redirect('/');
    }
}
