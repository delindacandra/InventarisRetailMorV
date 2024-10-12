<?php

namespace Database\Seeders;

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
                'nama_fungsi' => 'Executive GM',
            ],
            [
                'fungsi_id' => 2,
                'kode_fungsi' => 'F02',
                'nama_fungsi' => 'Corporate Sales',
            ],
            [
                'fungsi_id' => 3,
                'kode_fungsi' => 'F03',
                'nama_fungsi' => 'Corporate Opt & Srv',
            ],
            [
                'fungsi_id' => 4,
                'kode_fungsi' => 'F04',
                'nama_fungsi' => 'Retail Sales',
            ],
            [
                'fungsi_id' => 5,
                'kode_fungsi' => 'F05',
                'nama_fungsi' => 'Supply & Distribution',
            ],
            [
                'fungsi_id' => 6,
                'kode_fungsi' => 'F06',
                'nama_fungsi' => 'Rel & Proj. Dev.',
            ],
            [
                'fungsi_id' => 7,
                'kode_fungsi' => 'F07',
                'nama_fungsi' => 'HSSE',
            ],
            [
                'fungsi_id' => 8,
                'kode_fungsi' => 'F08',
                'nama_fungsi' => 'Procurement',
            ],
            [
                'fungsi_id' => 9,
                'kode_fungsi' => 'F09',
                'nama_fungsi' => 'Asset Operation',
            ],
            [
                'fungsi_id' => 10,
                'kode_fungsi' => 'F10',
                'nama_fungsi' => 'Finance',
            ],
            [
                'fungsi_id' => 11,
                'kode_fungsi' => 'F11',
                'nama_fungsi' => 'HC',
            ],
            [
                'fungsi_id' => 12,
                'kode_fungsi' => 'F12',
                'nama_fungsi' => 'Legal Counsel',
            ],
            [
                'fungsi_id' => 13,
                'kode_fungsi' => 'F13',
                'nama_fungsi' => 'Comm, Rel, & CSR',
            ],
            [
                'fungsi_id' => 14,
                'kode_fungsi' => 'F14',
                'nama_fungsi' => 'Medical',
            ],
            [
                'fungsi_id' => 15,
                'kode_fungsi' => 'F15',
                'nama_fungsi' => 'IA',
            ],
            [
                'fungsi_id' => 16,
                'kode_fungsi' => 'F16',
                'nama_fungsi' => 'SSC ICT MOR V',
            ],
            [
                'fungsi_id' => 17,
                'kode_fungsi' => 'F17',
                'nama_fungsi' => 'Group Head Operation',
            ],
            [
                'fungsi_id' => 18,
                'kode_fungsi' => '18',
                'nama_fungsi' => 'SSC ICT VI',
            ],
            [
                'fungsi_id' => 19,
                'kode_fungsi' => 'F19',
                'nama_fungsi' => 'Manager Sales Region V PT. PErtamina Lubricant',
            ],
            [
                'fungsi_id' => 20,
                'kode_fungsi' => 'F20',
                'nama_fungsi' => 'GM Marine Business & Operation Region II',
            ],

        ];
        DB::table('fungsi_jatimbalinus')->insert($data);
    }
}
