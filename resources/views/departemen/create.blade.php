@extends('_layouts.main')

@section('container')
    <div class="my-3">
        <div>
            <h4>Tambah {{ $title }}</h4>
            <hr>
        </div>

        <div class="col-md-4">
            <form action="/departemen" method="post">
                @csrf
                <div class="mb-3">
                    <label for="kode_departemen" class="form-label">Kode Departemen</label>
                    <input type="text" class="form-control @error('kode_departemen') is-invalid @enderror" name="kode_departemen" required>
                    @error('kode_departemen')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="nama_departemen" class="form-label">Nama Departemen</label>
                    <input type="text" class="form-control @error('nama_departemen') is-invalid @enderror" name="nama_departemen" required>
                    @error('nama_departemen')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="float-end">
                    <a href="/departemen" class="btn btn-danger">Kembali</a>
                    <button type="submit" class="btn btn-primary">Tambah Data</button>
                </div>

            </form>
        </div>

    </div>
@endsection
