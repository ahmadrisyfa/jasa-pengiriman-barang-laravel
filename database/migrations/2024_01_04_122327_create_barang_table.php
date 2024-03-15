<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBarangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('barang', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('kurir_id');
            $table->string('nama_tujuan');
            $table->string('berat');
            $table->string('kecamatan');
            $table->string('desa');
            $table->string('detail_rumah');
            $table->string('tarif');
            $table->string('status')->default('0')->comment('0=kurir menuju alamat anda, 1= kurir mengirim barang anda, 2=kurir berhasil mengirimkan barang')->nullable();
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
        Schema::dropIfExists('barang');
    }
}
