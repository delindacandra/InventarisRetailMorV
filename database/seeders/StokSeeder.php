<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StokSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data= [
            [
              'stok_id' => 1,
              'kode_stok' => 'ST001',
              'stok' => 50,
              'barang_id' => 1,
            ],
        ];
        DB::table('stok_barang')->insert($data);
    }
}
