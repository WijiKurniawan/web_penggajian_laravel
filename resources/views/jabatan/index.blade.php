@extends('_layouts.main')

@section('container')
    <div class="my-3">
        <div>
            <h4>{{ $title }}</h4>
            <hr>
            <a href="/jabatan/create" class="btn btn-primary mb-3">Tambah {{ $title }}</a>
        </div>

        @if(session()->has('error'))
            <div class="alert alert-danger alert-dismissible fade show mb-3 col-6" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if(session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show mb-3 col-6" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="table-responsive col-6">
            <table class="table table-striped table-light">
                <thead>
                <tr>
                    <th scope="col">No.</th>
                    <th scope="col">Kode jabatan</th>
                    <th scope="col">Nama jabatan</th>
                    <th scope="col">Tunjangan</th>
                    <th scope="col">Aksi</th>
                </tr>
                </thead>
                <tbody>

                @foreach($jabatan as $j)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $j->kode_jabatan }}</td>
                        <td>{{ $j->nama_jabatan }}</td>
                        <td>Rp {{ number_format($j->tunjangan, 0, '', '.') }}</td>
                        <td>
                            <a href="/jabatan/{{ $j->id }}/edit" class="btn btn-link pl-0 pb-0 pt-0 pr-2">Edit</a>
                            <form action="/jabatan/{{ $j->id }}" method="post" class="d-inline">
                                @method('delete')
                                @csrf

                                <button type="submit" class="btn btn-link p-0 border-0" onclick="return confirm('Yakin ingin menghapus jabatan {{ $j->nama_jabatan }}?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

    </div>
@endsection
