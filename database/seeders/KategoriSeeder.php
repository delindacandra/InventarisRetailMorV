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
                'kode_kategori' => 'KTG01',
                'nama_kategori' => 'Peralatan Promosi',
            ],
            [
                'kategori_id' => 2,
                'kode_kategori' => 'KTG02',
                'nama_kategori' => 'Elektronik',

            ],
            [
                'kategori_id' => 3,
                'kode_kategori' => 'KTG03',
                'nama_kategori' => 'Peralatan Dapur',

            ],
            [
                'kategori_id' => 4,
                'kode_kategori' => 'KTG04',
                'nama_kategori' => 'Peralatan Makan',

            ],
            [
                'kategori_id' => 5,
                'kode_kategori' => 'KTG05',
                'nama_kategori' => 'Perlengkapan Rumah',

            ],
            [
                'kategori_id' => 6,
                'kode_kategori' => 'KTG06',
                'nama_kategori' => 'Pakaian',

            ],
            [
                'kategori_id' => 7,
                'kode_kategori' => 'KTG07',
                'nama_kategori' => 'Aksesoris Fashion',

            ],
            [
                'kategori_id' => 8,
                'kode_kategori' => 'KTG08',
                'nama_kategori' => 'Souvernir',

            ],
            [
                'kategori_id' => 9,
                'kode_kategori' => 'KTG09',
                'nama_kategori' => 'Otomotif',

            ],
            [
                'kategori_id' => 10,
                'kode_kategori' => 'KTG10',
                'nama_kategori' => 'Alat Tulis Kantor',

            ],
        ];
        DB::table('kategori_barang')->insert($data);
    }
}
