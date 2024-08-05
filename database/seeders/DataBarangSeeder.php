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
                'kode_barang' => 'BP01',
                'nama_barang' => 'Buku Notes',
                'kategori_id' => 1,
                'jumlah' => 50,
                'harga' => 40000,
                'image'=> 'lanyard.png',
                'tanggal_diterima' => Carbon::now(),
            ],
            [
                'barang_id' => 2,
                'kode_barang' => 'BP02',
                'nama_barang' => 'Lanyard',
                'kategori_id' => 1,
                'jumlah' => 50,
                'harga' => 20000,
                'image'=> 'lanyard.png',
                'tanggal_diterima' => Carbon::now(),
            ],
            [
                'barang_id' => 3,
                'kode_barang' => 'BP03',
                'nama_barang' => 'Kaos Putih MyPertamina',
                'kategori_id' => 2,
                'jumlah' => 50,
                'harga' => 75000,
                'image'=> 'lanyard.png',
                'tanggal_diterima' => Carbon::now(),
            ],
            [
                'barang_id' => 4,
                'kode_barang' => 'BP04',
                'nama_barang' => 'Kaos Hitam Pertamina',
                'kategori_id' => 2,
                'jumlah' => 50,
                'harga' => 75000,
                'image'=> 'lanyard.png',
                'tanggal_diterima' => Carbon::now(),
            ],
            [
                'barang_id' => 5,
                'kode_barang' => 'BP05',
                'nama_barang' => 'Gantungan Kunci Karakter',
                'kategori_id' => 3,
                'jumlah' => 50,
                'harga' => 10000,
                'image'=> 'lanyard.png',
                'tanggal_diterima' => Carbon::now(),
            ],
            [
                'barang_id' => 6,
                'kode_barang' => 'BP06',
                'nama_barang' => 'Gantungan Kunci STNK',
                'kategori_id' => 3,
                'jumlah' => 50,
                'harga' => 25000,
                'image'=> 'lanyard.png',
                'tanggal_diterima' => Carbon::now(),
            ],
            [
                'barang_id' => 7,
                'kode_barang' => 'BP07',
                'nama_barang' => 'Stiker MyPertamina',
                'kategori_id' => 3,
                'jumlah' => 50,
                'harga' => 4000,
                'image'=> 'lanyard.png',
                'tanggal_diterima' => Carbon::now(),
            ],
            [
                'barang_id' => 8,
                'kode_barang' => 'BP08',
                'nama_barang' => 'Bucket Hat',
                'kategori_id' => 3,
                'jumlah' => 50,
                'harga' => 45000,
                'image'=> 'lanyard.png',
                'tanggal_diterima' => Carbon::now(),
            ],
            [
                'barang_id' => 9,
                'kode_barang' => 'BP09',
                'nama_barang' => 'Tumbler Karakter',
                'kategori_id' => 4,
                'jumlah' => 50,
                'harga' => 95000,
                'image'=> 'lanyard.png',
                'tanggal_diterima' => Carbon::now(),
            ],
            [
                'barang_id' => 10,
                'kode_barang' => 'BP10',
                'nama_barang' => 'Mug',
                'kategori_id' => 4,
                'jumlah' => 50,
                'harga' => 80000,
                'image'=> 'lanyard.png',
                'tanggal_diterima' => Carbon::now(),
            ],
            [
                'barang_id' => 11,
                'kode_barang' => 'BP11',
                'nama_barang' => 'Puzzle Buah-buahan',
                'kategori_id' => 5,
                'jumlah' => 50,
                'harga' => 35000,
                'image'=> 'lanyard.png',
                'tanggal_diterima' => Carbon::now(),
            ],
        ];
        DB::table('data_barang')->insert($data);
    }
}
