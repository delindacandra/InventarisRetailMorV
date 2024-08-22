<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DataBarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'barang_id' => 1,
                'kode_barang' => 'BP001',
                'nama_barang' => 'Buku tamu',
                'kategori_id' => 1,
                'harga' => 0,
                'image'=> 'lanyard.png',
            ],
        ];
        DB::table('data_barang')->insert($data);
    }
}
