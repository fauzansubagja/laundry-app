<?php

namespace Database\Seeders;

use App\Models\Paket;
use Illuminate\Database\Seeder;

class PaketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Paket::create([
            'nama_paket' => 'Cuci Lipat Rapi',
            'harga' => '35000',
            'jenis' => 'Kiloan',
            'outlet_id' => '1',
        ]);
        Paket::create([
            'nama_paket' => 'Regular Service',
            'harga' => '28000',
            'jenis' => 'Kiloan',
            'outlet_id' => '1',
        ]);
        Paket::create([
            'nama_paket' => 'One Day Service',
            'harga' => '30000',
            'jenis' => 'Lain',
            'outlet_id' => '1',
        ]);
        Paket::create([
            'nama_paket' => 'Setrika Wangi',
            'harga' => '8000',
            'jenis' => 'Lain',
            'outlet_id' => '1',
        ]);
        Paket::create([
            'nama_paket' => 'Selimut',
            'harga' => '10000',
            'jenis' => 'Selimut',
            'outlet_id' => '1',
        ]);
        Paket::create([
            'nama_paket' => 'Bed Cover',
            'harga' => '10000',
            'jenis' => 'Bed Cover',
            'outlet_id' => '1',
        ]);
        Paket::create([
            'nama_paket' => 'Kaos',
            'harga' => '10000',
            'jenis' => 'Kaos',
            'outlet_id' => '1',
        ]);
    }
}
