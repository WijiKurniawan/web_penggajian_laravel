<?php

namespace Database\Seeders;

use App\Models\Gaji;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GajiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Gaji::create([
            'id_karyawan'  => 1,
            'bulan'  => 'Juni',
            'tahun'  => 2022,
            'jumlah_jam_lembur'  => 10,
            'jumlah_cuti'  => 3,
        ]);

        Gaji::create([
            'id_karyawan'  => 2,
            'bulan'  => 'Juni',
            'tahun'  => 2022,
            'jumlah_jam_lembur'  => 12,
            'jumlah_cuti'  => 2,
        ]);
    }
}
