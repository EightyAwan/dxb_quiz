<?php

namespace Database\Seeders;

use DB;
use Hash; 
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'username' => 'john',
            'email' => 'john@mailinator.com', 
            'password' => Hash::make('john123'),
        ]);
    }
}
