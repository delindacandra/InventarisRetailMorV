<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use function Laravel\Prompts\table;

class SASeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('sales_area')->truncate();
        $data = [
            [
                'sa_id' => 1,
                'kode_sa' => 'SA01',
                'nama_sa' => 'SA Surabaya'
            ],
            [
                'sa_id' => 2,
                'kode_sa' => 'SA02',
                'nama_sa' => 'SA Malang'
            ],
            [
                'sa_id' => 3,
                'kode_sa' => 'SA03',
                'nama_sa' => 'SA Kediri'
            ],
            [
                'sa_id' => 4,
                'kode_sa' => 'SA04',
                'nama_sa' => 'SA Bali'
            ],
            [
                'sa_id' => 5,
                'kode_sa' => 'SA05',
                'nama_sa' => 'SA NTB'
            ],
            [
                'sa_id' => 6,
                'kode_sa' => 'SA06',
                'nama_sa' => 'SA NTT'
            ],
        ];
        DB::table('sales_area')->insert($data);
    }
}
