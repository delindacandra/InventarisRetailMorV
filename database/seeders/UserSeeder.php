<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'no_induk' => 987123,
                'nama' => 'Admin Retail',
                'password' => Hash::make('retailmor5'),
            ],
        ];
        DB::table('user')->insert($data);
    }
}
