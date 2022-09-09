@extends('_layouts.main')

@section('container')
    <div class="my-3">
        <div>
            <h4>Tambah {{ $title }}</h4>
            <hr>
        </div>

        <div class="col-md-4">
            <form action="/cabang" method="post">
                @csrf
                <div class="mb-3">
                    <label for="kode_cabang" class="form-label">Kode Cabang</label>
                    <input type="text" class="form-control @error('kode_cabang') is-invalid @enderror" name="kode_cabang" required>
                    @error('kode_cabang')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="nama_cabang" class="form-label">Nama Cabang</label>
                    <input type="text" class="form-control @error('nama_cabang') is-invalid @enderror" name="nama_cabang" required>
                    @error('nama_cabang')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="uang_makan" class="form-label">Uang Makan (Rp)</label>
                    <input type="number" min="0" class="form-control @error('uang_makan') is-invalid @enderror" name="uang_makan" required>
                    @error('uang_makan')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="float-end">
                    <a href="/cabang" class="btn btn-danger">Kembali</a>
                    <button type="submit" class="btn btn-primary">Tambah Data</button>
                </div>

            </form>
        </div>

    </div>
@endsection
