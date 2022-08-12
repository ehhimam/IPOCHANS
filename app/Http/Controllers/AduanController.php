<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AduanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard/aduan/index', [
            'post'  => Post::latest()->where('user_id', auth()->user()->id)->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard/aduan/create', [
            'kategori'  => Category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // menamngkap data dari form
        $ValidateData = $request->validate([
            'judul' => 'required|max:255|',
            'url'  => 'required',
            'category_id'   => 'required',
            'bukti' => 'required|file|max:1024',
            'keterangan'    => 'required'
        ]);

        // kondisi kalau ada upload gambar
        // jalankan ini, kalau kosong tidak akan jalan
        if ($request->file('bukti')) {
            $ValidateData['bukti'] = $request->file('bukti')->store('bukti');
        }

        // ambil user id yg sedang login
        // danjadikan untuk dimasukkan siapa yang post
        $ValidateData['user_id'] = auth()->user()->id;

        // insert data ke database
        Post::create($ValidateData);

        // redirect kalau berhasil
        return redirect('dashboard/posts')->with('pesan', 'Data aduan berhasil dikirim!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('dashboard/aduan/edit', [
            'post'  => $post,
            'kategori'    => Category::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        // kasi rules lagi untuk formnya
        $rules = [
            'judul' => 'required|max:255|',
            'url'  => 'required',
            'category_id'   => 'required',
            'bukti' => 'image|file|max:1024',
            'keterangan'    => 'required'
        ];

        // validasi data
        $validasi = $request->validate($rules);

        // kondisi untuk gambar
        // jika ada gambar baru maka gambar lama dihpus
        // kalau gak ada gmbr baru maka dibiarkan
        if ($request->file('bukti')) {
            if ($request->buktilama) {
                Storage::delete($request->buktilama);
            }
            // seting lagi ke validasi
            $validasi['bukti']  = $request->file('bukti')->store('bukti');
        }

        // validasi berdasrkan user yang update
        $validasi['user_id']    = auth()->user()->id;

        // lakukan update ke database
        Post::where('id', $post->id)->update($validasi);

        // return kalo berhasil
        return redirect('dashboard/posts')->with('pesan', 'Data berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        // untuk menghapus juga post yang ada gambarnya
        if ($post->bukti) {
            Storage::delete($post->bukti);
        }
        Post::destroy($post->id);

        return redirect('/dashboard/posts')->with('pesan', 'Data berhasil dihapus!');
    }
}
