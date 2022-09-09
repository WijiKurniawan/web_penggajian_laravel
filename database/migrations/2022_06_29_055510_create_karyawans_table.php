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
        Schema::create('karyawans', function (Blueprint $table) {
            $table->id();
            $table->string('nomor_induk', 16);
            $table->string('nama_karyawan', 255);
            $table->string('agama', 30);
            $table->string('status_pernikahan', 255);
            $table->integer('jumlah_anak');
            $table->string('no_telp', 20);
            $table->integer('id_jabatan');
            $table->integer('id_cabang');
            $table->integer('id_departemen');
            $table->double('gaji_pokok');
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
        Schema::dropIfExists('karyawans');
    }
};
