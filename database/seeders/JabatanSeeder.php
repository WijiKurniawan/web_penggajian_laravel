<?php

namespace Database\Seeders;

use App\Models\Jabatan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JabatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Jabatan::create([
            'kode_jabatan'  => 'STF',
            'nama_jabatan'  => 'Staff',
            'tunjangan'  => 800000,
        ]);

        Jabatan::create([
            'kode_jabatan'  => 'HD-STF',
            'nama_jabatan'  => 'Staff Kepala',
            'tunjangan'  => 1200000,
        ]);

        Jabatan::create([
            'kode_jabatan'  => 'HD-BRC',
            'nama_jabatan'  => 'Kepala Cabang',
            'tunjangan'  => 3200000,
        ]);
    }
}
