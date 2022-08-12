@extends('dashboard/layouts/main')

@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Data User Terdaftar </h1>
</div>

<div class="table-responsive col-lg-8">

    @if(session()->has('pesan'))
    <div class="alert alert-success">{{ session('pesan') }}</div>
    @endif
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nama Lengkap</th>
                <th scope="col">Email</th>
                <th scope="col">NoHp</th>
                <th scope="col">Tindakan</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $p)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $p->nama }}</td>
                <td>{{ $p->email }}</td>
                <td>{{ $p->nohp }}</td>
                <td>

                    <form action="/dashboard/users/{{ $p->id }}" method="POST" class="d-inline">
                        @method('delete')
                        @csrf
                        <button class="btn btn-danger border-0" onclick="return confirm('Yakin mau hapus?')"><span data-feather="x-circle"></span> Hapus</button>

                    </form>
                </td>
            </tr>
            @endforeach

        </tbody>
    </table>
</div>
</main>


@endsection