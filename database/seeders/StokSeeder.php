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
              'tanggal_stok' => Carbon::now(), 
            ],
            [
              'stok_id' => 2,
              'kode_stok' => 'ST002',
              'stok' => 50,
              'barang_id' => 2,
              'tanggal_stok' => Carbon::now(), 
            ],
            [
              'stok_id' => 3,
              'kode_stok' => 'ST003',
              'stok' => 50,
              'barang_id' => 3,
              'tanggal_stok' => Carbon::now(), 
            ],
            [
              'stok_id' => 4,
              'kode_stok' => 'ST004',
              'stok' => 50,
              'barang_id' => 4,
              'tanggal_stok' => Carbon::now(), 
            ],
            [
              'stok_id' => 5,
              'kode_stok' => 'ST005',
              'stok' => 50,
              'barang_id' => 5,
              'tanggal_stok' => Carbon::now(), 
            ],
            [
              'stok_id' => 6,
              'kode_stok' => 'ST006',
              'stok' => 50,
              'barang_id' => 6,
              'tanggal_stok' => Carbon::now(), 
            ],
            [
              'stok_id' => 7,
              'kode_stok' => 'ST007',
              'stok' => 50,
              'barang_id' => 7,
              'tanggal_stok' => Carbon::now(), 
            ],
            [
              'stok_id' => 8,
              'kode_stok' => 'ST008',
              'stok' => 50,
              'barang_id' => 8,
              'tanggal_stok' => Carbon::now(), 
            ],
            [
              'stok_id' => 9,
              'kode_stok' => 'ST009',
              'stok' => 50,
              'barang_id' => 9,
              'tanggal_stok' => Carbon::now(), 
            ],
            [
              'stok_id' => 10,
              'kode_stok' => 'ST0010',
              'stok' => 50,
              'barang_id' => 10,
              'tanggal_stok' => Carbon::now(), 
            ],
            [
              'stok_id' => 11,
              'kode_stok' => 'ST0011',
              'stok' => 50,
              'barang_id' => 11,
              'tanggal_stok' => Carbon::now(), 
            ],
            [
              'stok_id' => 12,
              'kode_stok' => 'ST0012',
              'stok' => 50,
              'barang_id' => 12,
              'tanggal_stok' => Carbon::now(), 
            ],
            [
              'stok_id' => 13,
              'kode_stok' => 'ST0013',
              'stok' => 50,
              'barang_id' => 13,
              'tanggal_stok' => Carbon::now(), 
            ],
            [
              'stok_id' => 14,
              'kode_stok' => 'ST0014',
              'stok' => 50,
              'barang_id' => 14,
              'tanggal_stok' => Carbon::now(), 
            ],
            [
              'stok_id' => 15,
              'kode_stok' => 'ST0015',
              'stok' => 50,
              'barang_id' => 15,
              'tanggal_stok' => Carbon::now(), 
            ],
            [
              'stok_id' => 16,
              'kode_stok' => 'ST0016',
              'stok' => 50,
              'barang_id' => 20,
              'tanggal_stok' => Carbon::now(), 
            ],
        ];
        DB::table('stok_barang')->insert($data);
    }
}
