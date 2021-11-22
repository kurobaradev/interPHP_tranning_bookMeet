<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin'),
            // 'role' => '1',
            'department_id' => '1',
        ]);
        DB::table('users')->insert([
            'name' => 'user',
            'email' => 'user@gmail.com',
            'password' => Hash::make('user'),
            'department_id' => '1',
        ]);
        DB::table('users')->insert([
            'name' => 'client',
            'email' => 'client@gmail.com',
            'password' => Hash::make('client'),
            'department_id' => '1',
        ]);
    }
}
