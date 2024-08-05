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
        Schema::create('barang_keluar', function (Blueprint $table) {
            $table->id('barang_keluar_id');
            $table->unsignedBigInteger('barang_id')->index();
            $table->unsignedBigInteger('fungsi_id')->index();
            $table->integer('jumlah');
            $table->string('keterangan');
            $table->dateTime('tanggal_keluar');
            $table->timestamps();
            $table->foreign('fungsi_id')->references('fungsi_id')->on('fungsi_jatimbalinus');
            $table->foreign('barang_id')->references('barang_id')->on('data_barang');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('barang_keluar');
    }
};
