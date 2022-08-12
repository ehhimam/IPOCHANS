@extends('dashboard/layouts/main')

@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Buat Aduan Konten </h1>
</div>

<div class="table-responsive col-lg-8">
    <a href="/dashboard/posts/create" class="btn btn-primary mb-3">Buat Aduan Konten</a>
    @if(session()->has('pesan'))
    <div class="alert alert-success">{{ session('pesan') }}</div>
    @endif
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Judul</th>
                <th scope="col">Kategori</th>
                <th scope="col">Status</th>
                <th scope="col">Tindakan</th>
            </tr>
        </thead>
        <tbody>
            @foreach($post as $p)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $p->judul }}</td>
                <td>{{ $p->category->nama }}</td>
                <td><button class="badge bg-info border-0">{{ $p->status }}</button></td>
                <td>


                    <a href="/dashboard/posts/{{ $p->id  }}/edit" class="btn btn-warning"><span data-feather="edit"></span> Edit</a>

                    <form action="/dashboard/posts/{{ $p->id }}" method="POST" class="d-inline">
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