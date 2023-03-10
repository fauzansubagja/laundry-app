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
            'jenis' => 'kiloan',
            'outlet_id' => '1',
        ]);
        Paket::create([
            'nama_paket' => 'Regular Service',
            'harga' => '28000',
            'jenis' => 'kiloan',
            'outlet_id' => '1',
        ]);
        Paket::create([
            'nama_paket' => 'One Day Service',
            'harga' => '30000',
            'jenis' => 'lain',
            'outlet_id' => '1',
        ]);
        Paket::create([
            'nama_paket' => 'Setrika Wangi',
            'harga' => '8000',
            'jenis' => 'lain',
            'outlet_id' => '1',
        ]);
        Paket::create([
            'nama_paket' => 'Selimut',
            'harga' => '10000',
            'jenis' => 'selimut',
            'outlet_id' => '1',
        ]);
        Paket::create([
            'nama_paket' => 'Bed Cover',
            'harga' => '10000',
            'jenis' => 'bed_cover',
            'outlet_id' => '1',
        ]);
        Paket::create([
            'nama_paket' => 'Kaos',
            'harga' => '10000',
            'jenis' => 'kaos',
            'outlet_id' => '1',
        ]);
    }
}
