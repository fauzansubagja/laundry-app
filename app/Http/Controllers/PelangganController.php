<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;

class PelangganController extends Controller
{   
    public function index()
    {
        $data = Member::all();
        // dd($data);
        return view('admin.pelanggan.index')->with([
            'data' => $data
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
        return view('admin.pelanggan.create');
    }

    public function store(Request $request)
    {
        // dd($request);
        $data['nama'] = $request->nama;
        $data['alamat'] = $request->alamat;
        $data['tlp'] = $request->tlp;
        $data['jenis_kelamin'] = $request->jenis_kelamin;
        Member::create($data);
    }

    public function edit($id)
    {
        $data = Member::findOrFail($id);
        return view('admin.pelanggan.edit')->with([
            'data' => $data
        ]);
    }

    public function show($id)
    {
    }

    public function update(Request $request, $id)
    {
        $data = Member::findOrFail($id);
        $data->nama = $request->nama;
        $data->alamat = $request->alamat;
        $data->tlp = $request->tlp;
        $data->jenis_kelamin = $request->jenis_kelamin;
        $data->save();
    }

    public function destroy($id)
    {
        $data = Member::findOrFail($id);
        $data->delete();
    }
}
