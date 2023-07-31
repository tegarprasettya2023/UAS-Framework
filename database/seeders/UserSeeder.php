<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name'   => 'Admin',
                'email'  => 'admin@gmail.com',
                'password' => bcrypt('adminadmin'),
                'remember_token' => null,
            ]
        ]);
    }
}
