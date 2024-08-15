<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FungsiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'fungsi_id' => 1,
                'kode_fungsi' => 'F01',
                'nama_fungsi' => 'COS Region',
            ],
            [
                'fungsi_id' => 2,
                'kode_fungsi' => 'F02',
                'nama_fungsi' => 'Lubricant',
            ],
            [
                'fungsi_id' => 3,
                'kode_fungsi' => 'F03',
                'nama_fungsi' => 'IT Surabaya',
            ],
            [
                'fungsi_id' => 4,
                'kode_fungsi' => 'F04',
                'nama_fungsi' => 'RPD',
            ],
            [
                'fungsi_id' => 5,
                'kode_fungsi' => 'F05',
                'nama_fungsi' => 'Internal Audit',
            ],
            [
                'fungsi_id' => 6,
                'kode_fungsi' => 'F06',
                'nama_fungsi' => 'Commrel',
            ],
            [
                'fungsi_id' => 7,
                'kode_fungsi' => 'F07',
                'nama_fungsi' => 'Retail',
            ],
            [
                'fungsi_id' => 8,
                'kode_fungsi' => 'F08',
                'nama_fungsi' => 'Procurement',
            ],
            [
                'fungsi_id' => 9,
                'kode_fungsi' => 'F09',
                'nama_fungsi' => 'Koperasi',
            ],
            [
                'fungsi_id' => 10,
                'kode_fungsi' => 'F10',
                'nama_fungsi' => 'Pertalife',
            ],
            [
                'fungsi_id' => 11,
                'kode_fungsi' => 'F11',
                'nama_fungsi' => 'Finance',
            ],
            [
                'fungsi_id' => 12,
                'kode_fungsi' => 'F12',
                'nama_fungsi' => 'HSSE',
            ],
            [
                'fungsi_id' => 13,
                'kode_fungsi' => 'F13',
                'nama_fungsi' => 'SSCT',
            ],
            [
                'fungsi_id' => 14,
                'kode_fungsi' => 'F14',
                'nama_fungsi' => 'ICT',
            ],
            [
                'fungsi_id' => 15,
                'kode_fungsi' => 'F15',
                'nama_fungsi' => 'EGM',
            ],
            [
                'fungsi_id' => 16,
                'kode_fungsi' => 'F16',
                'nama_fungsi' => 'PWP',
            ],
            [
                'fungsi_id' => 17,
                'kode_fungsi' => 'F17',
                'nama_fungsi' => 'AFT Juanda',
            ],
            [
                'fungsi_id' => 18,
                'kode_fungsi' => '18',
                'nama_fungsi' => 'Legal',
            ],
            [
                'fungsi_id' => 19,
                'kode_fungsi' => 'F19',
                'nama_fungsi' => 'Corp Sales',
            ],
            [
                'fungsi_id' => 20,
                'kode_fungsi' => 'F20',
                'nama_fungsi' => 'HC',
            ],
            [
                'fungsi_id' => 21,
                'kode_fungsi' => 'F21',
                'nama_fungsi' => 'Asset',
            ],
            [
                'fungsi_id' => 22,
                'kode_fungsi' => 'F22',
                'nama_fungsi' => 'S&D region',
            ],
            [
                'fungsi_id' => 23,
                'kode_fungsi' => 'F23',
                'nama_fungsi' => 'Medical',
            ],
            [
                'fungsi_id' => 24,
                'kode_fungsi' => 'F24',
                'nama_fungsi' => 'SA Retail Surabaya',
            ],
            [
                'fungsi_id' => 25,
                'kode_fungsi' => 'F25',
                'nama_fungsi' => ' BPG',
            ],
            [
                'fungsi_id' => 26,
                'kode_fungsi' => 'F26',
                'nama_fungsi' => 'PTK',
            ],
        ];
        DB::table('fungsi_jatimbalinus')->insert($data);
    }
}
