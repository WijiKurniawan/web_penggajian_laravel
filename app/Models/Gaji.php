<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gaji extends Model
{
    use HasFactory;
    protected $table = 'gajis';

    protected $fillable = [
        'id_karyawan',
        'bulan',
        'tahun',
        'jumlah_jam_lembur',
        'jumlah_cuti',
    ];
}
