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
            $table->string('kode_barang', 10)->unique();
            $table->string('nama_barang', 100)->unique();
            $table->unsignedBigInteger('kategori_id')->index();
            $table->integer('harga');
            $table->string('vendor');
            $table->string('image');
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
