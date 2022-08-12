@extends('layouts.main')

@section('container')
<h3 class="text-montserrat fw-bold mb-4">Hasil Pencarian!</h3>
<div class="category__product-row">



    @if($aduan->count())
    <table class="table">
        <thead>
            <tr>
                <th scope="col">KATEGORI</th>
                <th scope="col">URL</th>
                <th scope="col">STATUS</th>
            </tr>
        </thead>
        <tbody>
            @foreach($aduan as $a)
            <tr>
                <th scope="row">{{$a->category->nama }}</th>
                <td>{{ $a->url }}</td>
                <td>
                    @if($a->status == 'Diterima')
                    <div class="badge bg-success">Ada</div>
                    @elseif($a->status == 'Ditolak')
                    <div class="badge bg-danger">Data Ditolak</div>
                    @else
                    <div class="badge bg-info">Data Masih Diproses</div>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @else
    <p class="alert alert-danger">{{ request('cari') }} Tidak ditemkan didalam server!</p>
    @endif
</div>

@endsection