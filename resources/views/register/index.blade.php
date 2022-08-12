@extends('layouts/main')

@section('container')
<div class="row justify-content-center">
    <div class="col-md-6">
        <main class="form-registration">
            <h1 class="h3 mb-3 fw-normal text-center">{{ $judul }}</h1>
            <form autocomplete="off" action="/register" method="POST">
                @csrf
                <div class="form-floating">
                    <label for="name">Nama Lengkap</label>
                    <input type="text" class="form-control rounded-top @error('nama') is-invalid @enderror" id="name" name="nama" placeholder="Masukkan nama lengkap" required value="{{ old('nama') }}">


                    @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="form-floating">
                    <label for="email">Email</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="username" name="email" placeholder="Masukkan email" required value="{{ old('email') }}">


                    @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="form-floating">
                    <label for="nohp">Nomor Hp/WhatsApp</label>
                    <input type="text" class="form-control @error('nohp') is-invalid @enderror" id="email" name="nohp" placeholder="Masukkan nohp" required value="{{ old('nohp') }}">


                    @error('nohp')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-floating">
                    <label for="password">Password</label>
                    <input type="password" class="form-control rounded-buttom  @error('password') is-invalid @enderror" name="password" id="password" placeholder="masukkan password" required>


                    @error('password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>


                <button class="w-100 btn btn-lg btn-danger mt-3" type="submit">Daftar Sekarang!</button>

            </form>

            <small class="d-block text-center mt-3">Aready registered? <a href="/login">login now!</a></small>
        </main>
    </div>
</div>

@endsection