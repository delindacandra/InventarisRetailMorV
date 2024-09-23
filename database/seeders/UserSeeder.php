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
                'id' => 202401,
                'name' => 'Admin',
                'email' => 'ccmsjatimbalinus@gmail.com',
                'password' => Hash::make('ccmsmor5'),
            ],
        ];
        DB::table('users')->insert($data);
    }
}
