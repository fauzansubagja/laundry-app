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
            'name' => 'Admin',
            'username' => 'Administrator',
            'email' => 'admin@gmail.com',
            'role' => 'Admin',
            'password' => bcrypt('password'),
            'outlet_id' => '1',
        ]);
        User::create([
            'name' => 'Doofis',
            'username' => 'Doofildoofis',
            'email' => 'doofis@gmail.com',
            'role' => 'Kasir',
            'password' => bcrypt('password'),
            'outlet_id' => '1',
        ]);
        User::create([
            'name' => 'Luis',
            'username' => 'LuisMora',
            'email' => 'luis@gmail.com',
            'role' => 'Kasir',
            'password' => bcrypt('password'),
            'outlet_id' => '2',
        ]);
        User::create([
            'name' => 'Takuya',
            'username' => 'Takuya',
            'email' => 'takuya@gmail.com',
            'role' => 'Kasir',
            'password' => bcrypt('password'),
            'outlet_id' => '3',
        ]);
        User::create([
            'name' => 'Dolly',
            'username' => 'Dolly',
            'email' => 'dolly@gmail.com',
            'role' => 'Kasir',
            'password' => bcrypt('password'),
            'outlet_id' => '4',
        ]);
        User::create([
            'name' => 'Ryan',
            'username' => 'RyanLi',
            'email' => 'ryan@gmail.com',
            'role' => 'Owner',
            'password' => bcrypt('password'),
            'outlet_id' => '1',
        ]);
    }
}
