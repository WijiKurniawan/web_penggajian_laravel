@extends('_layouts.main')

@section('container')
    <div class="my-3">
        <div>
            <h4>Edit {{ $title }}</h4>
            <hr>
        </div>

        <div class="col-md-4">
            <form action="/cuti/{{ $cuti->id }}" method="post">
                @method('put')
                @csrf
                <div class="mb-3">
                    <label for="id_karyawan" class="form-label">Karyawan</label>
                    <select class="form-select" aria-label="Default select example" name="id_karyawan">
                        @foreach($karyawan as $k)
                            <option value="{{ $k->id }}" {{ $cuti->id_karyawan == $k->id ? 'selected' : '' }}>{{ $k->nomor_induk . ' - ' . $k->nama_karyawan }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="bulan" class="form-label">Bulan</label>
                    <select class="form-select" aria-label="Default select example" name="bulan">
                        @foreach($bulan as $b)
                            <option value="{{ $b }}" {{ $cuti->bulan == $b ? 'selected' : '' }}>{{ $b }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="tahun" class="form-label">Tahun</label>
                    <select class="form-select" aria-label="Default select example" name="tahun">
                        @foreach($tahun as $t)
                            <option value="{{ $t }}" {{ $b }}" {{ $cuti->tahun == $t ? 'selected' : '' }}>{{ $t }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="jumlah_cuti" class="form-label">Jumlah Cuti (Hari)</label>
                    <input type="number" min="0" class="form-control @error('jumlah_cuti') is-invalid @enderror" name="jumlah_cuti" required value="{{ old('jumlah_cuti', $cuti->jumlah_cuti) }}">
                    @error('jumlah_cuti')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="float-end">
                    <a href="/cuti" class="btn btn-danger">Kembali</a>
                    <button type="submit" class="btn btn-primary">Simpan Data</button>
                </div>
            </form>
        </div>

    </div>
@endsection
