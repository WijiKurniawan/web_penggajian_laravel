<?php

namespace Database\Seeders;

use App\Models\Karyawan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KaryawanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Karyawan::create([
            'nomor_induk'  => '1764548795658215',
            'nama_karyawan'  => 'Rahel Simanjuntak',
            'agama'  => 'Islam',
            'status_pernikahan'  => 'Sudah Menikah',
            'jumlah_anak'  => 4,
            'no_telp'  => '082256479548',
            'id_jabatan'  => 1,
            'id_cabang'  => 1,
            'id_departemen'  => 1,
            'gaji_pokok'  => 4200000,
        ]);

        Karyawan::create([
            'nomor_induk'  => '1654548799858216',
            'nama_karyawan'  => 'Maria Salsabila',
            'agama'  => 'Kristen',
            'status_pernikahan'  => 'Belum Menikah',
            'jumlah_anak'  => 0,
            'no_telp'  => '082256445548',
            'id_jabatan'  => 2,
            'id_cabang'  => 2,
            'id_departemen'  => 1,
            'gaji_pokok'  => 5200000,
        ]);
    }
}
