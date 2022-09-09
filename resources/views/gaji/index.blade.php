@extends('_layouts.main')

@section('container')
    <div class="my-3">
        <div>
            <h4>{{ $title }}</h4>
            <hr>
            <a href="/gaji/create" class="btn btn-primary mb-3">Tambah {{ $title }}</a>
        </div>

        @if(session()->has('error'))
            <div class="alert alert-danger alert-dismissible fade show mb-3 col-md-12" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if(session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show mb-3 col-md-12" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="table-responsive col-md-12">
            <table class="table table-striped table-light">
                <thead>
                <tr>
                    <th scope="col">No.</th>
                    <th scope="col">Karyawan</th>
                    <th scope="col">Periode</th>
                    <th scope="col">Gaji Pokok</th>
                    <th scope="col">Tunjangan Keluarga</th>
                    <th scope="col">Tunjangan Jabatan</th>
                    <th scope="col">Uang Makan</th>
                    <th scope="col">Uang Lembur</th>
                    <th scope="col">Potongan Cuti</th>
                    <th scope="col">Total Gaji</th>
                    <th scope="col">Aksi</th>
                </tr>
                </thead>
                <tbody>

                <?php
                function get_total($gaji_pokok, $jumlah_anak, $tunjangan, $uang_makan, $jumlah_jam, $jumlah_cuti) {
                    return ($gaji_pokok + (200000 * $jumlah_anak) + $tunjangan + (30 * $uang_makan) + (90000 * $jumlah_jam)) - (230000 * $jumlah_cuti);
                }
                ?>

                @foreach($gaji as $g)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $g->nomor_induk }} <hr class="m-1"> {{ $g->nama_karyawan }}</td>
                        <td>{{ $g->bulan }} <hr class="m-1"> {{ $g->tahun }}</td>
                        <td>Rp {{ number_format($g->gaji_pokok, 0, '' ,'.') }}</td>
                        <td>Rp {{ number_format(200000 * $g->jumlah_anak, 0, '' ,'.') }}</td>
                        <td>Rp {{ number_format($g->tunjangan, 0, '' ,'.') }}</td>
                        <td>Rp {{ number_format(30 * $g->uang_makan, 0, '' ,'.') }}</td>
                        <td>Rp {{ number_format(90000 * $g->jumlah_jam_lembur, 0, '' ,'.') }}</td>
                        <td>Rp {{ number_format(230000 * $g->jumlah_cuti, 0, '' ,'.') }}</td>
                        <td>Rp {{ number_format(get_total($g->gaji_pokok, $g->jumlah_anak, $g->tunjangan, $g->uang_makan, $g->jumlah_jam_lembur, $g->jumlah_cuti), 0, '' ,'.') }}</td>
                        <td>
                            <a href="/gaji/{{ $g->id }}/edit" class="btn btn-link pl-0 pb-0 pt-0 pr-2">Edit</a>
                            <form action="/gaji/{{ $g->id }}" method="post" class="d-inline">
                                @method('delete')
                                @csrf

                                <button type="submit" class="btn btn-link p-0 border-0" onclick="return confirm('Yakin ingin menghapus gaji {{ $g->nama_karyawan }}?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

    </div>
@endsection
