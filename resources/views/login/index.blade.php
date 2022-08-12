@extends('layouts/main')

@section('container')
<div class="row justify-content-center">
    <div class="col-md-6">
        @if(session()->has('pesan'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('pesan') }}

        </div>
        @endif

        @if(session()->has('gagal'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('gagal') }}

        </div>
        @endif

        <main class="form-signin">
            <h1 class="h3 mb-3 fw-normal text-center">{{ $judul }}</h1>
            <form action="/login" method="POST">
                <!-- pasang csrf supaya bisa di autentifikasi -->
                @csrf
                <div class="form-floating">
                    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" placeholder="masukkan email" autofocus required value="{{ old('email') }}">
                    <label for="email">Email address</label>

                    @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-floating">
                    <input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
                    <label for="password">Password</label>
                </div>


                <button class="w-100 btn btn-lg btn-danger" type="submit">Sign in</button>

            </form>

            <small class="d-block text-center mt-3">Belum mendaftar? <a href="/register">Yuk daftar sekarang!</a></small>
        </main>
    </div>
</div>

@endsection