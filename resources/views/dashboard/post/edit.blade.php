@extends('dashboard/layouts/main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Detail Aduan </h1>
</div>

<div class="col-lg-8">

    <div class="mb-3">
        <label for="keterangan" class="form-label">Pembuat</label>
        <input type="link" class="form-control " id="url" name="url" required value="{{ old('url', $post->author->nama) }}" readonly required>
    </div>
    <div class="mb-3">
        <label for="judul" class="form-label">Judul</label>
        <input type="text" class="form-control " id="judul" name="judul" required autofocus value="{{ old('judul', $post->judul) }}" readonly disabled>
    </div>

    <div class="mb-3">
        <label for="url" class="form-label">Link/URL Konten Ilegal</label>
        <input type="link" class="form-control " id="url" name="url" required value="{{ old('url', $post->url) }}" readonly required>

    </div>

    <div class="mb-3">
        <label for="url" class="form-label">Kategori Aduan</label>
        <input type="link" class="form-control " id="url" name="url" required value="{{ old('url', $post->category->nama) }}" readonly required>

    </div>

    <div class="mb-3">
        <label for="bukti" class="">Bukti Aduan</label>

        <img class="img-preview img-fluid mb-3 col-sm-5 d-block" src="{{ asset('storage/'. $post->bukti) }}">


    </div>

    <div class="mb-3">
        <label for="keterangan" class="form-label">Keterangan</label>

        <textarea class="form-control" id="keterangan" name="keterangan" rows="3" readonly>{{ $post->keterangan }}</textarea>
    </div>

    <div class="mb-3">
        <form action="/dashboard/post/{{ $post->id }}" method="POST">
            @method('put')
            @csrf
            <input type="hidden" name="status" id="status" value="Diterima">
            <button class="btn btn-success">Terima </button>
        </form>

        <form action="/dashboard/post/{{ $post->id }}" method="POST">
            @method('put')
            @csrf
            <input type="hidden" name="status" id="status" value="Ditolak">
            <button class="btn btn-danger">Tolak </button>
        </form>
    </div>

</div>




@endsection