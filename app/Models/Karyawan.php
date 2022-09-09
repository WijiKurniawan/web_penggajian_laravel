<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    use HasFactory;
    protected $table = 'karyawans';

    protected $fillable = [
        'nomor_induk',
        'nama_karyawan',
        'agama',
        'status_pernikahan',
        'jumlah_anak',
        'no_telp',
        'id_jabatan',
        'id_cabang',
        'id_departemen',
        'gaji_pokok',
    ];
}
