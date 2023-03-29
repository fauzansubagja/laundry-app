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
            'outlet_id' => '1',
        ]);
        User::create([
            'username' => 'RyanLi',
            'email' => 'ryan@gmail.com',
            'role' => 'Owner',
            'image' => 'profile.png',
            'password' => bcrypt('password'),
            'outlet_id' => '1',
        ]);
        User::create([
            'username' => 'Ilham',
            'email' => 'ilham@gmail.com',
            'role' => 'Pelanggan',
            'image' => 'profile.png',
            'password' => bcrypt('password'),
            'outlet_id' => '1',
        ]);
        User::create([
            'username' => 'Rangga',
            'email' => 'rangga@gmail.com',
            'role' => 'Pelanggan',
            'image' => 'profile.png',
            'password' => bcrypt('password'),
            'outlet_id' => '1',
        ]);
        User::create([
            'username' => 'Eva',
            'email' => 'eva@gmail.com',
            'role' => 'Pelanggan',
            'image' => 'profile.png',
            'password' => bcrypt('password'),
            'outlet_id' => '1',
        ]);
        User::create([
            'username' => 'Shafira',
            'email' => 'shafira@gmail.com',
            'role' => 'Pelanggan',
            'image' => 'profile.png',
            'password' => bcrypt('password'),
            'outlet_id' => '1',
        ]);
        User::create([
            'username' => 'Nadhil',
            'email' => 'nadhil@gmail.com',
            'role' => 'Pelanggan',
            'image' => 'profile.png',
            'password' => bcrypt('password'),
            'outlet_id' => '1',
        ]);
        User::create([
            'username' => 'Takuya',
            'email' => 'takuya@gmail.com',
            'role' => 'Pelanggan',
            'image' => 'profile.png',
            'password' => bcrypt('password'),
            'outlet_id' => '1',
        ]);
        User::create([
            'username' => 'Dolly',
            'email' => 'dolly@gmail.com',
            'role' => 'Pelanggan',
            'image' => 'profile.png',
            'password' => bcrypt('password'),
            'outlet_id' => '1',
        ]);
    }
}
