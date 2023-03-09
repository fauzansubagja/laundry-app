<?php

namespace Database\Seeders;

use App\Models\Member;
use Illuminate\Database\Seeder;

class MemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Member::create([
            'nama' => 'Ilham',
            'alamat' => 'Jl Ranca',
            'tlp' => '0890',
            'member_status' => 'Member',
            'jenis_kelamin' => 'Laki-Laki',
        ]);
        Member::create([
            'nama' => 'Rangga',
            'alamat' => 'Jl Moh Toha',
            'tlp' => '0891',
            'member_status' => 'Non Member',
            'jenis_kelamin' => 'Laki-Laki',
        ]);
        Member::create([
            'nama' => 'Eva',
            'alamat' => 'Jl braga',
            'tlp' => '0892',
            'member_status' => 'Non Member',
            'jenis_kelamin' => 'Perempuan',
        ]);
        Member::create([
            'nama' => 'Shafira',
            'alamat' => 'Jl Supratman',
            'tlp' => '0893',
            'member_status' => 'Member',
            'jenis_kelamin' => 'Perempuan',
        ]);
    }
}
