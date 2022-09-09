@extends('_layouts.main')

@section('container')
    <div class="my-3">
        <div>
            <h4>Edit {{ $title }}</h4>
            <hr>
        </div>

        <div class="col-md-4">
            <form action="/departemen/{{ $departemen->id }}" method="post">
                @method('put')
                @csrf
                <div class="mb-3">
                    <label for="kode_departemen" class="form-label">Kode departemen</label>
                    <input type="text" class="form-control @error('kode_departemen') is-invalid @enderror" name="kode_departemen" required value="{{ old('kode_departemen', $departemen->kode_departemen) }}">
                    @error('kode_departemen')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="nama_departemen" class="form-label">Nama Departemen</label>
                    <input type="text" class="form-control @error('nama_departemen') is-invalid @enderror" name="nama_departemen" required value="{{ old('nama_departemen', $departemen->nama_departemen) }}">
                    @error('nama_departemen')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="float-end">
                    <a href="/departemen" class="btn btn-danger">Kembali</a>
                    <button type="submit" class="btn btn-primary">Simpan Data</button>
                </div>
            </form>
        </div>

    </div>
@endsection
