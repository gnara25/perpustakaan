<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;

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
            'username' => 'admin',
            'name'	=> 'admin',
            'notelepon' => '085932232900',
            'role' => 'admin',
            'foto' => 'default.jpg',
            'email'	=>  'admin@admin.com',
            'password'	=> bcrypt('admin12'),
         ]);
         DB::table('users')->insert([
            'username' => 'user',
            'name'	=> 'user',
            'notelepon' => '08594232900',
            'role' => 'user',
            'foto' => 'default.jpg',
            'email'	=>  'user@user.com',
            'password'	=> bcrypt('user12'),
         ]);
    }
}
