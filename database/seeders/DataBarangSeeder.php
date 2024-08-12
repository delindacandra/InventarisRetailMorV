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
            [
                'barang_id' => 2,
                'kode_barang' => 'BP002',
                'nama_barang' => 'Pouch Mypertamina',
                'kategori_id' => 1,
                'harga' => 0,
                'image'=> 'lanyard.png',
            ],
            [
                'barang_id' => 3,
                'kode_barang' => 'BP003',
                'nama_barang' => 'Lanyard MyPertamina',
                'kategori_id' => 1,
                'harga' => 0,
                'image'=> 'lanyard.png',
            ],
            [
                'barang_id' => 4,
                'kode_barang' => 'BP004',
                'nama_barang' => 'Flashdisk',
                'kategori_id' => 2,
                'harga' => 0,
                'image'=> 'lanyard.png',
            ],
            [
                'barang_id' => 5,
                'kode_barang' => 'BP005',
                'nama_barang' => 'Kipas My Pertamina',
                'kategori_id' => 2,
                'harga' => 0,
                'image'=> 'lanyard.png',
            ],
            [
                'barang_id' => 6,
                'kode_barang' => 'BP006',
                'nama_barang' => 'Earphone Set Ekslusif',
                'kategori_id' => 2,
                'harga' => 0,
                'image'=> 'lanyard.png',
            ],
            [
                'barang_id' => 7,
                'kode_barang' => 'BP007',
                'nama_barang' => 'Kipas Angin Portable',
                'kategori_id' => 2,
                'harga' => 0,
                'image'=> 'lanyard.png',
            ],
            [
                'barang_id' => 8,
                'kode_barang' => 'BP008',
                'nama_barang' => 'Gantungan Kunci Mobil',
                'kategori_id' => 3,
                'harga' => 0,
                'image'=> 'lanyard.png',
            ],
            [
                'barang_id' => 9,
                'kode_barang' => 'BP009',
                'nama_barang' => 'Gantungan Kunci Motor Jiffy',
                'kategori_id' => 3,
                'harga' => 0,
                'image'=> 'lanyard.png',
            ],
            [
                'barang_id' => 10,
                'kode_barang' => 'BP010',
                'nama_barang' => 'Box Kulit (cluth, card holder, gantungan kunci)',
                'kategori_id' => 3,
                'harga' => 0,
                'image'=> 'lanyard.png',
            ],
            [
                'barang_id' => 11,
                'kode_barang' => 'BP011',
                'nama_barang' => 'gantungan kunci mobil kulit',
                'kategori_id' => 3,
                'harga' => 0,
                'image'=> 'lanyard.png',
            ],
            [
                'barang_id' => 12,
                'kode_barang' => 'BP012',
                'nama_barang' => 'Goodie Bag Kertas',
                'kategori_id' => 4,
                'harga' => 0,
                'image'=> 'lanyard.png',
            ],
            [
                'barang_id' => 13,
                'kode_barang' => 'BP013',
                'nama_barang' => 'Goodie Bag Bright gas putih',
                'kategori_id' => 4,
                'harga' => 0,
                'image'=> 'lanyard.png',
            ],
            [
                'barang_id' => 14,
                'kode_barang' => 'BP014',
                'nama_barang' => 'Goodie Bag bright gas pink',
                'kategori_id' => 4,
                'harga' => 0,
                'image'=> 'lanyard.png',
            ],
            [
                'barang_id' => 15,
                'kode_barang' => 'BP015',
                'nama_barang' => 'Goodie bag my pertamina',
                'kategori_id' => 4,
                'harga' => 0,
                'image'=> 'lanyard.png',
            ],
        ];
        DB::table('data_barang')->insert($data);
    }
}
