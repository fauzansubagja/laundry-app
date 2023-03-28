<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'username' => 'Administrator',
            'email' => 'admin@gmail.com',
            'role' => 'Admin',
            'image' => 'profile.png',
            'password' => bcrypt('password'),
            'outlet_id' => '1',
        ]);
        User::create([
            'username' => 'Doofildoofis',
            'email' => 'doofis@gmail.com',
            'role' => 'Kasir',
            'image' => 'profile.png',
            'password' => bcrypt('password'),
            'outlet_id' => '1',
        ]);
        User::create([
            'username' => 'LuisMora',
            'email' => 'luis@gmail.com',
            'role' => 'Kasir',
            'image' => 'profile.png',
            'password' => bcrypt('password'),
            'outlet_id' => '2',
        ]);
        User::create([
            'username' => 'Takuya',
            'email' => 'takuya@gmail.com',
            'role' => 'Kasir',
            'image' => 'profile.png',
            'password' => bcrypt('password'),
            'outlet_id' => '3',
        ]);
        User::create([
            'username' => 'Dolly',
            'email' => 'dolly@gmail.com',
            'role' => 'Kasir',
            'image' => 'profile.png',
            'password' => bcrypt('password'),
            'outlet_id' => '4',
        ]);
        User::create([
            'username' => 'RyanLi',
            'email' => 'ryan@gmail.com',
            'role' => 'Owner',
            'image' => 'profile.png',
            'password' => bcrypt('password'),
            'outlet_id' => '1',
        ]);
    }
}
