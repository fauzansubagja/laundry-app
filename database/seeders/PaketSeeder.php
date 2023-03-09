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
            'harga' => 'Rp. 35.000',
            'jenis' => 'kiloan',
            'outlet_id' => '1',
        ]);
        Paket::create([
            'nama_paket' => 'Regular Service',
            'harga' => 'Rp. 28.000',
            'jenis' => 'kiloan',
            'outlet_id' => '1',
        ]);
        Paket::create([
            'nama_paket' => 'One Day Service',
            'harga' => 'Rp. 30.000',
            'jenis' => 'lain',
            'outlet_id' => '1',
        ]);
        Paket::create([
            'nama_paket' => 'Setrika Wangi',
            'harga' => 'Rp. 8.000',
            'jenis' => 'lain',
            'outlet_id' => '1',
        ]);
        Paket::create([
            'nama_paket' => 'Selimut',
            'harga' => 'Rp. 10.000',
            'jenis' => 'selimut',
            'outlet_id' => '1',
        ]);
        Paket::create([
            'nama_paket' => 'Bed Cover',
            'harga' => 'Rp. 10.000',
            'jenis' => 'bed_cover',
            'outlet_id' => '1',
        ]);
        Paket::create([
            'nama_paket' => 'Kaos',
            'harga' => 'Rp. 10.000',
            'jenis' => 'kaos',
            'outlet_id' => '1',
        ]);
    }
}
