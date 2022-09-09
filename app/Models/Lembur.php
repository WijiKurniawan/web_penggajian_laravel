<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lembur extends Model
{
    use HasFactory;
    protected $table = 'lemburs';

    protected $fillable = [
        'id_karyawan',
        'bulan',
        'tahun',
        'jumlah_jam',
    ];
}
