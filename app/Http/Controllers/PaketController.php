<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Paket;
use App\Models\Outlet;

class PaketController extends Controller
{
    public function __construct()
    {
        // $this->middleware('role:admin,owner');
        $this->middleware('role:admin', ['except' => ['index', 'read','create','store','edit','update','destroy']]);
    }

    public function index()
    {
        return view('admin.Paket.index',[
            'paket' => Paket::all(),
            'outlet' => Outlet::all(),
        ]);
    }

    public function read()
    {
        $data = Paket::all();
        return view('admin.Paket.read')->with([
            'data' => $data
        ]);
    }

    public function create()
    {
        return view('admin.Paket.create',[
            'paket' => Paket::all(),
            'outlet' => Outlet::all(),
        ]);
    }

    public function store(Request $request)
    {
        // dd($request);
        $data['nama_paket'] = $request->nama_paket;
        $data['harga'] = $request->harga;
        $data['jenis'] = $request->jenis;
        $data['outlet_id'] = $request->outlet_id;
        Paket::create($data);
    }

    public function edit($id)
    {
        return view('admin.Paket.edit',[
            'outlet' => Outlet::all(),
            'pakets' => Paket::findOrFail($id),
        ]);
    }

    public function show($id)
    {
    }

    public function update(Request $request, $id)
    {
        $data = Paket::findOrFail($id);
        $data->nama_paket = $request->nama_paket;
        $data->harga = $request->harga;
        $data->jenis = $request->jenis;
        $data->outlet_id = $request->outlet_id;
        $data->save();
    }

    public function destroy($id)
    {
        $data = Paket::findOrFail($id);
        // dd($data);
        $data->delete();
    }
}
