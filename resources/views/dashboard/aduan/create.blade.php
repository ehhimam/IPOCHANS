@extends('dashboard/layouts/main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Buat Aduan Konten </h1>
</div>

<div class="col-lg-8">
    <form method="POST" action="/dashboard/posts" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="judul" class="form-label">Judul</label>
            <input type="text" class="form-control @error('judul') is-invalid @enderror" id="judul" name="judul" required autofocus value="{{ old('judul') }}">

            @error('judul')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror

        </div>

        <div class="mb-3">
            <label for="url" class="form-label">Link/URL Konten Ilegal</label>
            <input type="link" class="form-control @error('url') is-invalid @enderror" id="url" name="url" required value="{{ old('url') }}">

            @error('url')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="category_id" class="form-label">Kategori Aduan</label>
            <select class="form-select" name="category_id" id="category_id">

                @foreach($kategori as $cat)
                @if(old('category_id') == $cat->id)
                <option value="{{ $cat->id }}" selected>{{ $cat->nama }}</option>
                @else
                <option value="{{ $cat->id }}">{{ $cat->nama }}</option>
                @endif
                @endforeach

            </select>
        </div>

        <div class="mb-3">
            <label for="bukti" class="">Upload Bukti Berupa Gambar</label>

            <img class="img-preview img-fluid mb-3 col-sm-5">

            <input type="file" class="form-control @error('bukti') is-invalid @enderror" id="bukti" name="bukti" onchange="previewImage()">

            @error('bukti')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="keterangan" class="form-label">Keterangan</label>

            @error('keterangan')
            <p class="text-danger">{{ $message }}</p>
            @enderror


            <textarea class="form-control" id="keterangan" name="keterangan" rows="3"></textarea>
        </div>

        <div class="mb-3">
            <div class="alert alert-warning" role="alert">
                <span data-feather="info"></span> Sebelum mengirim data, pastikan data yang diinput sudah benar!
            </div>
        </div>



        <button type="submit" class="btn btn-primary">Kirim Data!</button>
    </form>
</div>



<!-- untuk preview gambar -->
<script>
    function previewImage() {
        const image = document.querySelector('#image');
        const imgPreview = document.querySelector('.img-preview');

        imgPreview.style.display = 'block';

        const oFReader = new FileReader();
        oFReader.readAsDataURL(image.files[0]);

        oFReader.onload = function(oFRevent) {
            imgPreview.src = oFRevent.target.result;
        }
    }
</script>


@endsection