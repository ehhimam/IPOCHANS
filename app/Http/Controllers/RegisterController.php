<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\User;

class RegisterController extends Controller
{
    //
    public function index()
    {
        return view('register.index', [
            'judul' => 'Halaman Pendaftaran!'
        ]);
    }

    public function store(Request $request)
    {
        // melakukan validasi 
        // menggunakan fitur validate
        $validateData = $request->validate([
            'nama'  => 'required|max:255',
            'email' =>  'required|email:dns|unique:users',
            'nohp'  => 'required|max:14',
            'password'  => 'required|min:5|max:20',
        ]);

        // enkripsi password secara terpisah
        $validateData['password'] = bcrypt($validateData['password']);

        // lakukan input ke database
        // dengan memanggil nama model dan creaate
        User::create($validateData);

        // buat session untuk menampilkan
        // pesan apakah data berhasil / no
        $request->session()->flash('pesan', 'Pendaftaran Berhasil, silahkan login!');

        // lakukan redirect apabila berhasil
        return redirect('/login');
    }
}
