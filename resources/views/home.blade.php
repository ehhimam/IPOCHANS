@extends('layouts.main')

@section('container')
<h3 class="text-montserrat fw-bold">Cek Data!</h3>
<div class="category__product-row">
    <div class="category__title"></div>

    <form action="/aduan/cari" method="GET">
        <div class="input-group input-group-lg">
            <input type="text" class="form-control" name="cari" placeholder="Masukan Url website yang ingin dicari" value="{{ old('cari') }}">
            <button class="btn btn-danger" type="submit">Cari</button>

        </div>
    </form>

</div>

<div class="contegory__product-row mt-4">

    <div class="container-fluid text-center">
        <h2><i class="bi bi-arrow-down"></i>Cara Melapor</h2>
        <h4>Aduan Konten Illegal</h4>
        <br>
        <div class="row">
            <div class="col-sm-4">
                <i class="fa-solid fa-right-to-bracket fa-4x"></i>
                <h4>DAFTAR</h4>
                <p>Daftar untuk dapat mengirim aduan</p>
            </div>
            <div class="col-sm-4">
                <i class="fa-solid fa-square-plus fa-4x"></i>
                <h4>BUAT ADUAN</h4>
                <p>Buat aduan laporan konten illegal</p>
            </div>
            <div class="col-sm-4">
                <i class="fa-solid fa-paper-plane fa-4x"></i>
                <h4>KIRIM ADUAN</h4>
                <p>Kirim data aduan dan selesai..</p>
            </div>
        </div>


    </div>

</div>



@endsection