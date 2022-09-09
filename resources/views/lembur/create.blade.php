@extends('_layouts.main')

@section('container')
    <div class="my-3">
        <div>
            <h4>Tambah {{ $title }}</h4>
            <hr>
        </div>

        <div class="col-md-4">
            <form action="/lembur" method="post">
                @csrf
                <div class="mb-3">
                    <label for="id_karyawan" class="form-label">Karyawan</label>
                    <select class="form-select" aria-label="Default select example" name="id_karyawan">
                        @foreach($karyawan as $k)
                            <option value="{{ $k->id }}">{{ $k->nomor_induk . ' - ' . $k->nama_karyawan }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="bulan" class="form-label">Bulan</label>
                    <select class="form-select" aria-label="Default select example" name="bulan">
                        @foreach($bulan as $b)
                            <option value="{{ $b }}">{{ $b }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="tahun" class="form-label">Tahun</label>
                    <select class="form-select" aria-label="Default select example" name="tahun">
                        @foreach($tahun as $t)
                            <option value="{{ $t }}">{{ $t }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="jumlah_jam" class="form-label">Jumlah Lembur (Jam)</label>
                    <input type="number" min="0" class="form-control @error('jumlah_jam') is-invalid @enderror" name="jumlah_jam" required>
                    @error('jumlah_jam')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="float-end">
                    <a href="/lembur" class="btn btn-danger">Kembali</a>
                    <button type="submit" class="btn btn-primary">Tambah Data</button>
                </div>

            </form>
        </div>

    </div>
@endsection
