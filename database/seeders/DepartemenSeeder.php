<?php

namespace Database\Seeders;

use App\Models\Departemen;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DepartemenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Departemen::create([
            'kode_departemen'  => 'DPT-KAU',
            'nama_departemen'  => 'Departemen Keuangan',
        ]);

        Departemen::create([
            'kode_departemen'  => 'DPT-DNA',
            'nama_departemen'  => 'Departemen Dana Usaha',
        ]);

        Departemen::create([
            'kode_departemen'  => 'DPT-OPT',
            'nama_departemen'  => 'Departemen Operasional',
        ]);
    }
}
