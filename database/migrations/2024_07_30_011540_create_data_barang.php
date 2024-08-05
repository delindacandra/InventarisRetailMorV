<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('data_barang', function (Blueprint $table) {
            $table->id('barang_id');
            $table->string('kode_barang', 10);
            $table->string('nama_barang', 100);
            $table->unsignedBigInteger('kategori_id')->index();
            $table->integer('jumlah');
            $table->double('harga');
            $table->string('image');
            $table->dateTime('tanggal_diterima');
            $table->timestamps();
            $table->foreign('kategori_id')->references('kategori_id')->on('kategori_barang');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_barang');
    }
};
