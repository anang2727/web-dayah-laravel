<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('users')->insert([
            [
                'name' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('admin123'),
                'role' => 'admin',
            ],
            [
                'name' => 'guru',
                'email' => 'guru@gmail.com',
                'password' => bcrypt('guru123'),
                'role' => 'guru',
            ],
            [
                'name' => 'santri',
                'email' => 'santri@gmail.com',
                'password' => bcrypt('santri123'),
                'role' => 'santri',
            ],
        ]);
    }
}
