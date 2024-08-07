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
        Schema::create('stok_barang', function (Blueprint $table) {
            $table->id('stok_id');
            $table->string('kode_stok')->unique();
            $table->integer('stok');
            $table->unsignedBigInteger('barang_id')->index();
            $table->date('tanggal_stok');
            $table->timestamps();
            $table->foreign('barang_id')->references('barang_id')->on('data_barang');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stok_barang');
    }
};
