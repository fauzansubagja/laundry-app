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
            'tlp' => '082130002048',
        ]);
    }
}
