<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Paket;
use App\Models\Member;
use App\Models\Outlet;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function index()
    {
        return view('admin.transaksi.index', [
            'transaksi' => Transaksi::all(),
            'user' => User::all(),
            'outlet' => Outlet::all(),
        ]);
    }

    public function getPaketPrice($id)
    {
        $paket = Paket::find($id);
        $harga = $paket->harga;
        return response()->json(['harga' => $harga]);
    }


    public function read()
    {
        $data = User::all();
        return view('admin.transaksi.read')->with([
            'data' => $data
        ]);
    }

    public function create()
    {
        return view('admin.transaksi.create', [
            'outlet' => Outlet::all(),
            'transaksi' => Transaksi::all(),
            'user' => User::all(),
            'member' => Member::all(),
            'paket' => Paket::all(),
        ]);
    }

    public function getDiskon(Request $request)
    {
        $total = $request->input('total'); // ambil nilai total dari request

        // logika untuk menghitung diskon
        if ($total >= 500000) {
            $diskon = 0.2 * $total;
        } elseif ($total >= 250000) {
            $diskon = 0.1 * $total;
        } else {
            $diskon = 0;
        }

        return response()->json(['diskon' => $diskon]); // kembalikan nilai diskon dalam bentuk JSON
    }


    public function store(Request $request)
    {
        // dd($request);
        $data['outlet_id'] = $request->outlet_id;
        $data['member_id'] = $request->member_id;
        $data['user_id'] = $request->user_id;
        $data['paket_id'] = $request->paket_id;
        $data['tgl_transaksi'] = $request->tgl_transaksi;
        $data['diskon'] = $request->diskon;
        $data['total_biaya'] = $request->total_biaya;
        $data['status'] = $request->status;
        $data['dibayar'] = $request->dibayar;
        User::create($data);
    }

    public function edit($id)
    {
        return view('admin.transaksi.edit', [
            'outlet' => Outlet::all(),
            'transaksi' => Transaksi::findOrFail($id),
            'user' => User::all(),
            'member' => Member::all(),
            'paket' => Paket::all(),
        ]);
    }

    public function show($id)
    {
    }

    public function update(Request $request, $id)
    {
        $data = Transaksi::findOrFail($id);
        $data->outlet_id = $request->outlet_id;
        $data->member_id = $request->member_id;
        $data->user_id = $request->user_id;
        $data->paket_id = $request->paket_id;
        $data->kode_invoice = $request->kode_invoice;
        $data->tgl_transaksi = $request->tgl_transaksi;
        $data->diskon = $request->diskon;
        $data->total_biaya = $request->total_biaya;
        $data->status = $request->status;
        $data->dibayar = $request->dibayar;
        $data->save();
    }

    public function destroy($id)
    {
        $data = Transaksi::findOrFail($id);
        // dd($data);
        $data->delete();
    }
}
