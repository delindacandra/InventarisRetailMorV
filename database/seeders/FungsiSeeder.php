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
                'nama_fungsi' => 'Finance',
            ],
            [
                'fungsi_id' => 2,
                'kode_fungsi' => 'F02',
                'nama_fungsi' => 'Human Resources (HR)',
            ],
            [
                'fungsi_id' => 3,
                'kode_fungsi' => 'F03',
                'nama_fungsi' => 'Reability & Project Development',
            ],
            [
                'fungsi_id' => 4,
                'kode_fungsi' => 'F04',
                'nama_fungsi' => 'IT Support',
            ],
            [
                'fungsi_id' => 5,
                'kode_fungsi' => 'F05',
                'nama_fungsi' => 'Marketing and Communication',
            ],
            [
                'fungsi_id' => 6,
                'kode_fungsi' => 'F06',
                'nama_fungsi' => 'Internal Audit',
            ],
            [
                'fungsi_id' => 7,
                'kode_fungsi' => 'F07',
                'nama_fungsi' => 'Operations',
            ],
            [
                'fungsi_id' => 8,
                'kode_fungsi' => 'F08',
                'nama_fungsi' => 'Supply Chain Management',
            ],
            [
                'fungsi_id' => 9,
                'kode_fungsi' => 'F09',
                'nama_fungsi' => 'Health, Safety, Security, and Environment (HSSE)',
            ],
            [
                'fungsi_id' => 10,
                'kode_fungsi' => 'F10',
                'nama_fungsi' => 'Legal',
            ],
            [
                'fungsi_id' => 11,
                'kode_fungsi' => 'F11',
                'nama_fungsi' => 'Corporate Secretary',
            ],
        ];
        DB::table('fungsi_jatimbalinus')->insert($data);
    }
}
