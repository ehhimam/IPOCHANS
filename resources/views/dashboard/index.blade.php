@extends('dashboard/layouts/main')

@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Welcome Back {{ auth()->user()->nama }} </h1>
</div>

<!-- kondisi kalau bukan admin dan admin -->
<!-- kalau admin munculkan berikut -->
@if(auth()->user()->role_id == '1')
<div class="row row-cols-1 row-cols-md-3 mb-3 text-center">
    <div class="col">
        <div class="card mb-4 rounded-3 shadow-sm">
            <div class="card-header py-3">
                <h4 class="my-0 fw-normal">Jumlah Aduan</h4>
            </div>
            <div class="card-body">
                <h1 class="card-title pricing-card-title mb-5">{{ $post }}<small class="text-muted fw-light">/Aduan</small></h1>

                <a href="/dashboard/post" type="button" class="w-100 btn btn-lg btn-outline-primary">Daftar Aduan!</a>
            </div>
        </div>
    </div>

    <div class="col">
        <div class="card mb-4 rounded-3 shadow-sm">
            <div class="card-header py-3">
                <h4 class="my-0 fw-normal"> Jumlah Users</h4>
            </div>
            <div class="card-body">
                <h1 class="card-title pricing-card-title mb-5">{{ $users }}<small class="text-muted fw-light">/Users</small></h1>

                <a href="/dashboard/users" type="button" class="w-100 btn btn-lg btn-outline-primary">Daftar Users!</a>
            </div>
        </div>
    </div>

    <div class="col">
        <div class="card mb-4 rounded-3 shadow-sm">
            <div class="card-header py-3">
                <h4 class="my-0 fw-normal"> Jumlah Category</h4>
            </div>
            <div class="card-body">
                <h1 class="card-title pricing-card-title mb-5">{{ $kategori }}<small class="text-muted fw-light">/Kategori</small></h1>

                <a href="/dashboard/categories" type="button" class="w-100 btn btn-lg btn-outline-primary">Daftar Kategori!</a>
            </div>
        </div>
    </div>
</div>
@else
<!-- kalau bukan admin munculkan ini -->
<div class="row row-cols-1 row-cols-md-3 mb-3 text-center">
    <div class="col">
        <div class="card mb-4 rounded-3 shadow-sm">
            <div class="card-header py-3">
                <h4 class="my-0 fw-normal">Jumlah Aduan Saya</h4>
            </div>
            <div class="card-body">
                <h1 class="card-title pricing-card-title mb-5">{{ $posts }}<small class="text-muted fw-light">/Aduan</small></h1>

                <a href="/dashboard/posts" type="button" class="w-100 btn btn-lg btn-outline-primary">Buat Aduan Sekarang!</a>
            </div>
        </div>
    </div>

</div>
@endif


@endsection