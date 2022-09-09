<?php

namespace Database\Seeders;

use App\Models\Lembur;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LemburSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Lembur::create([
            'id_karyawan'  => 1,
            'bulan'  => 'Juni',
            'tahun'  => 2022,
            'jumlah_jam'  => 10,
        ]);

        Lembur::create([
            'id_karyawan'  => 2,
            'bulan'  => 'Juni',
            'tahun'  => 2022,
            'jumlah_jam'  => 12,
        ]);
    }
}
