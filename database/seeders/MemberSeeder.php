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
            'kode_member' => 'KM-2023001',
            'nama' => 'Ilham',
            'alamat' => 'Jl Ranca',
            'tlp' => '0890',
            'member_status' => 'Member',
            'jenis_kelamin' => 'Laki-Laki',
            'user_id' => '5',
        ]);
        Member::create([
            'kode_member' => 'KM-2023002',
            'nama' => 'Rangga',
            'alamat' => 'Jl Moh Toha',
            'tlp' => '0891',
            'member_status' => 'Non Member',
            'jenis_kelamin' => 'Laki-Laki',
            'user_id' => '6',
        ]);
        Member::create([
            'kode_member' => 'KM-2023003',
            'nama' => 'Eva',
            'alamat' => 'Jl braga',
            'tlp' => '0892',
            'member_status' => 'Non Member',
            'jenis_kelamin' => 'Perempuan',
            'user_id' => '7',
        ]);
        Member::create([
            'kode_member' => 'KM-2023004',
            'nama' => 'Shafira',
            'alamat' => 'Jl Supratman',
            'tlp' => '0893',
            'member_status' => 'Member',
            'jenis_kelamin' => 'Perempuan',
            'user_id' => '8',
        ]);
        Member::create([
            'kode_member' => 'KM-2023005',
            'nama' => 'Nadhil',
            'alamat' => 'Jl Supratman',
            'tlp' => '0893',
            'member_status' => 'Member',
            'jenis_kelamin' => 'Laki-Laki',
            'user_id' => '9',
        ]);
        Member::create([
            'kode_member' => 'KM-2023006',
            'nama' => 'Takuya',
            'alamat' => 'Jl Supratman',
            'tlp' => '0893',
            'member_status' => 'Member',
            'jenis_kelamin' => 'Laki-Laki',
            'user_id' => '10',
        ]);
        Member::create([
            'kode_member' => 'KM-2023007',
            'nama' => 'Dolly',
            'alamat' => 'Jl Supratman',
            'tlp' => '0893',
            'member_status' => 'Member',
            'jenis_kelamin' => 'Laki-Laki',
            'user_id' => '11',
        ]);
    }
}
