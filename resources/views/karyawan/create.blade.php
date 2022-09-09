@extends('_layouts.main')

@section('container')
    <div class="my-3">
        <div>
            <h4>Tambah {{ $title }}</h4>
            <hr>
        </div>

        <div class="col-md-12">
            <form action="/karyawan" method="post">
                @csrf

                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="nomor_induk" class="form-label">Nomor Induk</label>
                            <input type="text" class="form-control @error('nomor_induk') is-invalid @enderror" name="nomor_induk" required>
                            @error('nomor_induk')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="nama_karyawan" class="form-label">Nama Karyawan</label>
                            <input type="text" class="form-control @error('nama_karyawan') is-invalid @enderror" name="nama_karyawan" required>
                            @error('nama_karyawan')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="agama" class="form-label">Agama</label>
                            <select class="form-select" aria-label="Default select example" name="agama">
                                @foreach($agama as $d)
                                    <option value="{{ $d }}">{{ $d }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="status_pernikahan" class="form-label">Status Pernikahan</label>
                            <select class="form-select" aria-label="Default select example" name="status_pernikahan">
                                @foreach($status_pernikahan as $d)
                                    <option value="{{ $d }}">{{ $d }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="jumlah_anak" class="form-label">Jumlah Anak</label>
                            <input type="number" min="0" class="form-control @error('jumlah_anak') is-invalid @enderror" name="jumlah_anak" required>
                            @error('jumlah_anak')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="no_telp" class="form-label">No. Telepon</label>
                            <input type="text" class="form-control @error('no_telp') is-invalid @enderror" name="no_telp" required>
                            @error('no_telp')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="id_jabatan" class="form-label">Jabatan</label>
                            <select class="form-select" aria-label="Default select example" name="id_jabatan">
                                @foreach($jabatan as $d)
                                    <option value="{{ $d->id }}">{{ $d->kode_jabatan . ' - ' . $d->nama_jabatan }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="id_departemen" class="form-label">Departemen</label>
                            <select class="form-select" aria-label="Default select example" name="id_departemen">
                                @foreach($departemen as $d)
                                    <option value="{{ $d->id }}">{{ $d->kode_departemen . ' - ' . $d->nama_departemen }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="id_cabang" class="form-label">Cabang</label>
                            <select class="form-select" aria-label="Default select example" name="id_cabang">
                                @foreach($cabang as $d)
                                    <option value="{{ $d->id }}">{{ $d->kode_cabang . ' - ' . $d->nama_cabang }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="gaji_pokok" class="form-label">Gaji Pokok (Rp)</label>
                            <input type="number" min="0" class="form-control @error('gaji_pokok') is-invalid @enderror" name="gaji_pokok" required>
                            @error('gaji_pokok')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="float-end">
                            <a href="/karyawan" class="btn btn-danger">Kembali</a>
                            <button type="submit" class="btn btn-primary">Tambah Data</button>
                        </div>
                    </div>
                </div>

            </form>
        </div>

    </div>
@endsection
