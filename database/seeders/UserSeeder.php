<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        user::create([
            'username' => 'admin',
            'name'	=> 'admin',
            'notelepon' => '085932232900',
            'role' => 'admin',
            'foto' => 'default.jpg',
            'email'	=>  'admin@admin.com',
            'password'	=> bcrypt('admin12')
    ]);
    }
}
