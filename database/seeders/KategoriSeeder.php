<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'kategori_id' => 1,
                'kode_kategori' => 'BRG01',
                'nama_kategori' => 'ATK',
            ],
            [
                'kategori_id' => 2,
                'kode_kategori' => 'BRG02',
                'nama_kategori' => 'Pakaian',

            ],
            [
                'kategori_id' => 3,
                'kode_kategori' => 'BRG03',
                'nama_kategori' => 'Aksessoris',

            ],
            [
                'kategori_id' => 4,
                'kode_kategori' => 'BRG04',
                'nama_kategori' => 'Alat Makan',

            ],
            [
                'kategori_id' => 5,
                'kode_kategori' => 'BRG05',
                'nama_kategori' => 'Mainan Anak',

            ],
        ];
        DB::table('kategori_barang')->insert($data);
    }
}
