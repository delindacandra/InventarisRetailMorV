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
                'nama_kategori' => 'Elektronik',

            ],
            [
                'kategori_id' => 3,
                'kode_kategori' => 'BRG03',
                'nama_kategori' => 'Gantungan kunci',

            ],
            [
                'kategori_id' => 4,
                'kode_kategori' => 'BRG04',
                'nama_kategori' => 'Goodie bag',

            ],
            [
                'kategori_id' => 5,
                'kode_kategori' => 'BRG05',
                'nama_kategori' => 'Goodie bag',

            ],
            [
                'kategori_id' => 6,
                'kode_kategori' => 'BRG06',
                'nama_kategori' => 'Kaos',

            ],
            [
                'kategori_id' => 7,
                'kode_kategori' => 'BRG07',
                'nama_kategori' => 'Jersey',

            ],
            [
                'kategori_id' => 8,
                'kode_kategori' => 'BRG08',
                'nama_kategori' => 'Peralaratan dapur',

            ],
            [
                'kategori_id' => 9,
                'kode_kategori' => 'BRG09',
                'nama_kategori' => 'Plakat',

            ],
            [
                'kategori_id' => 10,
                'kode_kategori' => 'BRG10',
                'nama_kategori' => 'Stiker',

            ],
            [
                'kategori_id' => 11,
                'kode_kategori' => 'BRG11',
                'nama_kategori' => 'Tempat tisu',

            ],
            [
                'kategori_id' => 12,
                'kode_kategori' => 'BRG12',
                'nama_kategori' => 'Tumbler',

            ],
            [
                'kategori_id' => 13,
                'kode_kategori' => 'BRG13',
                'nama_kategori' => 'Umbul-umbul',

            ],
            [
                'kategori_id' => 14,
                'kode_kategori' => 'BRG14',
                'nama_kategori' => 'Tas Lipat',

            ],
        ];
        DB::table('kategori_barang')->insert($data);
    }
}
