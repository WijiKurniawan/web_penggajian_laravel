@extends('_layouts.main')

@section('container')
    <div class="my-3">
        <div>
            <h4>Edit {{ $title }}</h4>
            <hr>
        </div>

        <div class="col-md-4">
            <form action="/jabatan/{{ $jabatan->id }}" method="post">
                @method('put')
                @csrf
                <div class="mb-3">
                    <label for="kode_jabatan" class="form-label">Kode jabatan</label>
                    <input type="text" class="form-control @error('kode_jabatan') is-invalid @enderror" name="kode_jabatan" required value="{{ old('kode_jabatan', $jabatan->kode_jabatan) }}">
                    @error('kode_jabatan')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="nama_jabatan" class="form-label">Nama jabatan</label>
                    <input type="text" class="form-control @error('nama_jabatan') is-invalid @enderror" name="nama_jabatan" required value="{{ old('nama_jabatan', $jabatan->nama_jabatan) }}">
                    @error('nama_jabatan')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="tunjangan" class="form-label">Tunjangan (Rp)</label>
                    <input type="number" min="0" class="form-control @error('tunjangan') is-invalid @enderror" name="tunjangan" required value="{{ old('tunjangan', $jabatan->tunjangan) }}">
                    @error('tunjangan')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="float-end">
                    <a href="/jabatan" class="btn btn-danger">Kembali</a>
                    <button type="submit" class="btn btn-primary">Simpan Data</button>
                </div>
            </form>
        </div>

    </div>
@endsection
