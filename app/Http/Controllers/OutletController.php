<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Outlet;

class OutletController extends Controller
{
    public function index()
    {
        return view('admin.outlet.index');
    }

    public function read()
    {
        $data = Outlet::all();
        return view('admin.outlet.read')->with([
            'data' => $data
        ]);
    }

    public function create()
    {
        return view('admin.outlet.create');
    }

    public function store(Request $request)
    {
        // dd($request);
        $data['nama'] = $request->nama;
        $data['alamat'] = $request->alamat;
        $data['tlp'] = $request->tlp;
        Outlet::create($data);
    }

    public function edit($id)
    {
        $data = Outlet::findOrFail($id);
        return view('admin.outlet.edit')->with([
            'data' => $data
        ]);
    }

    public function show($id)
    {
    }

    public function update(Request $request, $id)
    {
        $data = Outlet::findOrFail($id);
        $data->nama = $request->nama;
        $data->alamat = $request->alamat;
        $data->tlp = $request->tlp;
        $data->save();
    }

    public function destroy($id)
    {
        $data = Outlet::findOrFail($id);
        $data->delete();
    }
}
