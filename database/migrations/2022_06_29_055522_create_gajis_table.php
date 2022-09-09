<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gajis', function (Blueprint $table) {
            $table->id();
            $table->integer('id_karyawan');
            $table->string('bulan', 20);
            $table->integer('tahun');
            $table->integer('jumlah_jam_lembur');
            $table->integer('jumlah_cuti');
//            $table->double('tunjangan_jabatan');
//            $table->double('tunjangan_keluarga');
//            $table->double('uang_makan');
//            $table->double('uang_lembur');
//            $table->double('potongan_cuti');
//            $table->double('total_gaji');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gajis');
    }
};
