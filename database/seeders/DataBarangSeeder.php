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
                'nama_barang' => 'Buku Notes',
                'kategori_id' => 1,
                'harga' => 40000,
                'image'=> 'lanyard.png',
            ],
            [
                'barang_id' => 2,
                'kode_barang' => 'BP002',
                'nama_barang' => 'Lanyard',
                'kategori_id' => 1,
                'harga' => 20000,
                'image'=> 'lanyard.png',
            ],
            [
                'barang_id' => 3,
                'kode_barang' => 'BP003',
                'nama_barang' => 'Kaos Biru MyPertamina',
                'kategori_id' => 2,
                'harga' => 75000,
                'image'=> 'lanyard.png',
            ],
            [
                'barang_id' => 4,
                'kode_barang' => 'BP004',
                'nama_barang' => 'Topi',
                'kategori_id' => 2,
                'harga' => 75000,
                'image'=> 'lanyard.png',
            ],
            [
                'barang_id' => 5,
                'kode_barang' => 'BP005',
                'nama_barang' => 'Gantungan Kunci Karakter',
                'kategori_id' => 3,
                'harga' => 10000,
                'image'=> 'lanyard.png',
            ],
            [
                'barang_id' => 6,
                'kode_barang' => 'BP006',
                'nama_barang' => 'Bantal Leher',
                'kategori_id' => 3,
                'harga' => 25000,
                'image'=> 'lanyard.png',
            ],
            [
                'barang_id' => 7,
                'kode_barang' => 'BP007',
                'nama_barang' => 'Stiker MyPertamina',
                'kategori_id' => 3,
                'harga' => 4000,
                'image'=> 'lanyard.png',
            ],
            [
                'barang_id' => 8,
                'kode_barang' => 'BP008',
                'nama_barang' => 'Bucket Hat',
                'kategori_id' => 3,
                'harga' => 45000,
                'image'=> 'lanyard.png',
            ],
            [
                'barang_id' => 9,
                'kode_barang' => 'BP009',
                'nama_barang' => 'Tumbler Karakter',
                'kategori_id' => 4,
                'harga' => 95000,
                'image'=> 'lanyard.png',
            ],
            [
                'barang_id' => 10,
                'kode_barang' => 'BP010',
                'nama_barang' => 'Mug',
                'kategori_id' => 4,
                'harga' => 80000,
                'image'=> 'lanyard.png',
            ],
            [
                'barang_id' => 11,
                'kode_barang' => 'BP011',
                'nama_barang' => 'Puzzle Buah-buahan',
                'kategori_id' => 5,
                'harga' => 35000,
                'image'=> 'lanyard.png',
            ],
            [
                'barang_id' => 12,
                'kode_barang' => 'BP012',
                'nama_barang' => 'Powerbank',
                'kategori_id' => 5,
                'harga' => 59000,
                'image'=> 'lanyard.png',
            ],
            [
                'barang_id' => 13,
                'kode_barang' => 'BP013',
                'nama_barang' => 'Totebag',
                'kategori_id' => 5,
                'harga' => 40000,
                'image'=> 'lanyard.png',
            ],
            [
                'barang_id' => 14,
                'kode_barang' => 'BP014',
                'nama_barang' => 'Pewangi Mobil',
                'kategori_id' => 5,
                'harga' => 25000,
                'image'=> 'lanyard.png',
            ],
            [
                'barang_id' => 15,
                'kode_barang' => 'BP015',
                'nama_barang' => 'Lunch Bag',
                'kategori_id' => 5,
                'harga' => 30000,
                'image'=> 'lanyard.png',
            ],
        ];
        DB::table('data_barang')->insert($data);
    }
}
