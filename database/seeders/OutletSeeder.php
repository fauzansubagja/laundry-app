<?php

namespace Database\Seeders;

use App\Models\Outlet;
use Illuminate\Database\Seeder;

class OutletSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Outlet::create([
            'nama' => 'Cabang 1',
            'alamat' => 'Jl Jupiter',
            'tlp' => '0820',
        ]);
        Outlet::create([
            'nama' => 'Cabang 2',
            'alamat' => 'Jl Mars',
            'tlp' => '0821',
        ]);
        Outlet::create([
            'nama' => 'Cabang 3',
            'alamat' => 'Jl Pluto',
            'tlp' => '0822',
        ]);
        Outlet::create([
            'nama' => 'Cabang 4',
            'alamat' => 'Jl Bulan',
            'tlp' => '0822',
        ]);
    }
}
