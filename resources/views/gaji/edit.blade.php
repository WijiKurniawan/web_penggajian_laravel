@extends('_layouts.main')

@section('container')
    <div class="my-3">
        <div>
            <h4>Edit {{ $title }}</h4>
            <hr>
        </div>

        @if(session()->has('error'))
            <div class="alert alert-danger alert-dismissible fade show mb-3 col-md-4" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="col-md-4">
            <form action="/gaji/{{ $gaji->id }}" method="post">
                @method('put')
                @csrf
                <div class="mb-3">
                    <label for="id_karyawan" class="form-label">Karyawan</label>
                    <select class="form-select" aria-label="Default select example" name="id_karyawan">
                        @foreach($karyawan as $k)
                            <option value="{{ $k->id }}" {{ $k->id == $gaji->id_karyawan ? 'selected' : '' }}>{{ $k->nomor_induk . ' - ' . $k->nama_karyawan }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="bulan" class="form-label">Bulan</label>
                    <select class="form-select" aria-label="Default select example" name="bulan">
                        @foreach($bulan as $b)
                            <option value="{{ $b }}" {{ $b == $gaji->bulan ? 'selected' : '' }}>{{ $b }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="tahun" class="form-label">Tahun</label>
                    <select class="form-select" aria-label="Default select example" name="tahun">
                        @foreach($tahun as $t)
                            <option value="{{ $t }}" {{ $t == $gaji->tahun ? 'selected' : '' }}>{{ $t }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="float-end">
                    <a href="/gaji" class="btn btn-danger">Kembali</a>
                    <button type="submit" class="btn btn-primary">Simpan Data</button>
                </div>

            </form>
        </div>

    </div>
@endsection
