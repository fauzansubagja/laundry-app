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
        $data['outlet_id'] = $request->outlet_id;
        $data['member_id'] = $request->member_id;
        $data['user_id'] = $request->user_id;
        $data['paket_id'] = $request->paket_id;
        $tgl_transaksi = date('Y-m-d', strtotime($request->input('tgl_transaksi')));
        $data['tgl_transaksi'] = $tgl_transaksi;


        // generate kode_invoice dengan format "INV-tgl skrng"
        $kode_invoice = "INV-" . date('Ymd');
        $data['kode_invoice'] = $kode_invoice;

        $data['diskon'] = null;
        $data['total_biaya'] = $request->total_biaya;
        $data['status'] = $request->status;
        $data['dibayar'] = $request->dibayar;

        if ($request->has('diskon') && $request->diskon != null) {
            // ekstraksi nilai diskon numerik dari input diskon
            preg_match_all('/\d+/', $request->diskon, $matches);
            $diskon_numerik = implode('', $matches[0]);

            // simpan nilai diskon numerik ke dalam variabel 'diskon'
            $data['diskon'] = (int) $diskon_numerik;
        }

        // simpan data ke dalam database
        Transaksi::create($data);
    }

    public function edit($id)
    {
        // dd(Transaksi::where('id',$id)->get());
        return view('admin.transaksi.edit', [
            'transaksi' => Transaksi::where('id', $id)->first(),
            'transaksis' => Transaksi::find($id),
            'outlet' => Outlet::all(),
            'user' => User::all(),
            'member' => Member::all(),
            'paket' => Paket::all(),
        ]);
    }

    public function detail($id)
    {
        // dd(Transaksi::where('id',$id)->get());
        return view('admin.transaksi.detail', [
            'transaksi' => Transaksi::where('id', $id)->first(),
            'transaksis' => Transaksi::find($id),
            'outlet' => Outlet::all(),
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
        $data = Transaksi::where('id', $id)->first();
        $data['outlet_id'] = $request->outlet_id;
        $data['member_id'] = $request->member_id;
        $data['user_id'] = $request->user_id;
        $data['paket_id'] = $request->paket_id;
        $data['tgl_transaksi'] = $request->tgl_transaksi;

        // generate kode_invoice dengan format "INV-tgl skrng"
        $tgl_sekarang = date('Ymd');
        $data['kode_invoice'] = "INV-$tgl_sekarang";

        $data['diskon'] = null;
        $data['total_biaya'] = $request->total_biaya;
        $data['status'] = $request->status;
        $data['dibayar'] = $request->dibayar;

        if ($request->has('diskon') && $request->diskon != null) {
            // ekstraksi nilai diskon numerik dari input diskon
            preg_match_all('/\d+/', $request->diskon, $matches);
            $diskon_numerik = implode('', $matches[0]);

            // simpan nilai diskon numerik ke dalam variabel 'diskon'
            $data['diskon'] = (int) $diskon_numerik;
        }
        $data->save();
    }

    public function destroy($id)
    {
        $data = Transaksi::where('id', $id)->first();
        // dd($data);
        $data->delete();
    }
}
