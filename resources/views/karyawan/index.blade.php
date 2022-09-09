@extends('_layouts.main')

@section('container')
    <div class="my-3">
        <div>
            <h4>{{ $title }}</h4>
            <hr>
            <a href="/karyawan/create" class="btn btn-primary mb-3">Tambah {{ $title }}</a>
        </div>

        @if(session()->has('error'))
            <div class="alert alert-danger alert-dismissible fade show mb-3 col-12" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if(session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show mb-3 col-12" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="table-responsive col-12">
            <table class="table table-striped table-light">
                <thead>
                <tr>
                    <th scope="col">No.</th>
                    <th scope="col">Nomor Induk</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Agama</th>
                    <th scope="col">Status Pernikahan</th>
                    <th scope="col">Jumlah Anak</th>
                    <th scope="col">Telepon</th>
                    <th scope="col">Jabatan</th>
                    <th scope="col">Departemen</th>
                    <th scope="col">Cabang</th>
                    <th scope="col">Gaji Pokok</th>
                    <th scope="col">Aksi</th>
                </tr>
                </thead>
                <tbody>

                @foreach($karyawan as $k)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $k->nomor_induk }}</td>
                        <td>{{ $k->nama_karyawan }}</td>
                        <td>{{ $k->agama }}</td>
                        <td>{{ $k->status_pernikahan }}</td>
                        <td>{{ $k->jumlah_anak }}</td>
                        <td>{{ $k->no_telp }}</td>
                        <td>{{ $k->kode_jabatan }}</td>
                        <td>{{ $k->kode_departemen }}</td>
                        <td>{{ $k->kode_cabang }}</td>
                        <td>Rp {{ number_format($k->gaji_pokok, 0, '', '.') }}</td>
                        <td>
                            <a href="/karyawan/{{ $k->id }}/edit" class="btn btn-link pl-0 pb-0 pt-0 pr-2">Edit</a>
                            <form action="/karyawan/{{ $k->id }}" method="post" class="d-inline">
                                @method('delete')
                                @csrf

                                <button type="submit" class="btn btn-link p-0 border-0" onclick="return confirm('Yakin ingin menghapus karyawan {{ $k->nomor_induk }}?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

    </div>
@endsection
