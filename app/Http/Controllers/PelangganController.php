<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;

class PelangganController extends Controller
{
    public function index()
    {

        return view('admin.pelanggan.index')->with([
            'member' => Member::all(),
        ]);
    }
    public function read()
    {
        $data = Member::all();
        // dd($data);
        return view('admin.pelanggan.read')->with([
            'data' => $data
        ]);
    }

    public function create()
    {
        // buat kode member otomatis
        $kode_tahun = 'KM-' . date('Y');
        $no_urut = sprintf('%03d', Member::count() + 1);
        $kode_member = $kode_tahun . $no_urut;

        return view('admin.pelanggan.create', compact('kode_member'));
    }

    public function store(Request $request)
    {
        $data['nama'] = $request->nama;
        $data['alamat'] = $request->alamat;
        $data['tlp'] = $request->tlp;
        $data['jenis_kelamin'] = $request->jenis_kelamin;
        $data['kode_member'] = $request->kode_member;

        Member::create($data);
    }

    public function edit($id)
    {
        return view('admin.pelanggan.edit')->with([
            'member' => Member::findOrFail($id),
        ]);
    }

    public function show($id)
    {
    }

    public function update(Request $request, $id)
    {
        $data['nama'] = $request->nama;
        $data['alamat'] = $request->alamat;
        $data['tlp'] = $request->tlp;
        $data['jenis_kelamin'] = $request->jenis_kelamin;

        $member = Member::find($id);
        $member->update($data);

        // update kode member
        $kode_member = $member->kode_member;
        $member->update(['kode_member' => $kode_member]);
    }

    public function destroy($id)
    {
        $data = Member::findOrFail($id);
        $data->delete();
    }
}
