<?php

namespace Database\Seeders;

use App\Models\Cabang;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CabangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Cabang::create([
            'kode_cabang'  => 'PLM-001',
            'nama_cabang'  => 'Palembang Sudirman',
            'uang_makan'  => 30000,
        ]);

        Cabang::create([
            'kode_cabang'  => 'JMB-002',
            'nama_cabang'  => 'Jambi Pelabuhan',
            'uang_makan'  => 28000,
        ]);

        Cabang::create([
            'kode_cabang'  => 'JKT-003',
            'nama_cabang'  => 'Jakarta Bundaran HI',
            'uang_makan'  => 35000,
        ]);
    }
}
