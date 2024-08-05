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
        Schema::create('barang_masuk', function (Blueprint $table) {
            $table->id('barang_masuk_id');
            $table->unsignedBigInteger('barang_id')->index();
            $table->integer('jumlah');
            $table->string('keterangan');
            $table->dateTime('tanggal_diterima');
            $table->timestamps();
            $table->foreign('barang_id')->references('barang_id')->on('data_barang');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('barang_masuk');
    }
};
