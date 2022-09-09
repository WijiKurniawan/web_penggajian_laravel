<?php

namespace Database\Seeders;

use App\Models\Cuti;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CutiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Cuti::create([
            'id_karyawan'  => 1,
            'bulan'  => 'Juni',
            'tahun'  => 2022,
            'jumlah_cuti'  => 3,
        ]);

        Cuti::create([
            'id_karyawan'  => 2,
            'bulan'  => 'Juni',
            'tahun'  => 2022,
            'jumlah_cuti'  => 2,
        ]);
    }
}
