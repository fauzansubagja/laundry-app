<?php

namespace App\Http\Controllers;

use App\Models\DetailTransaksi;
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
        ]);
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
        // membuat kode invoice otomatis dengan format INV-ymd(no urut)
        $kode_tahun = 'INV-' . date('Ym') . date('d');
        $no_urut = sprintf('%02d', Transaksi::count() + 1);
        $kode_invoice = $kode_tahun . $no_urut;

        // membuat tanggal transaksi otomatis dengan format Y-m-d H:i:s
        date_default_timezone_set('Asia/Jakarta');
        $tgl_transaksi = date('Y-m-d H:i:s');

        return view('admin.transaksi.create', [
            'tgl_transaksi' => $tgl_transaksi,
            'kode_invoice' => $kode_invoice,
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

    public function getPaketPrice($id)
    {
        $paket = Paket::find($id);
        $harga = $paket->harga;
        return response()->json(['harga' => $harga]);
    }

    public function store(Request $request)
    {
        $data['outlet_id'] = $request->outlet_id;
        $data['member_id'] = $request->member_id;
        $data['user_id'] = $request->user_id;
        $data['kode_invoice'] = $request->kode_invoice;
        $data['tgl_transaksi'] = $request->tgl_transaksi;
        $data['diskon'] = null;
        $data['total_biaya'] = $request->total_biaya;
        $data['status'] = $request->status;
        $data['dibayar'] = $request->dibayar;

        // create a new transaction data in the database
        $transaksi = Transaksi::create($data);

        if ($request->has('paket_id') && !empty($request->paket_id)) {
            foreach ($request->paket_id as $id) {
                $paket = Paket::find($id);
                if ($paket) {
                    // create a new detail_transaksi record for each selected package
                    $detail = new DetailTransaksi();
                    $detail->transaksi_id = $transaksi->id;
                    $detail->paket_id = $paket->id;
                    // $detail->member_id = $request->member_id;
                    // $detail->outlet_id = $request->outlet_id;
                    $detail->save();
                }
            }
        }

        if ($request->has('diskon') && $request->diskon != null) {
            // extract the numeric value of the discount from the input
            preg_match_all('/\d+/', $request->diskon, $matches);
            $diskon_numerik = implode('', $matches[0]);

            // save the discount value to the $data variable
            $data['diskon'] = (int) $diskon_numerik;
        }

        // update the transaction record with the final data, including the discount value (if any)
        $transaksi->update($data);
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
        $transaksi = Transaksi::where('id', $id)->first();
        $detailTransaksi = DetailTransaksi::where('transaksi_id', $id)->get();
        return view('admin.transaksi.detail', [
            'transaksi' => $transaksi,
            'detailTransaksi' => $detailTransaksi
        ]);
    }

    public function show($id)
    {
    }


    public function update(Request $request, $id)
    {
        $transaksi = Transaksi::findOrFail($id);

        $transaksi->outlet_id = $request->outlet_id;
        $transaksi->member_id = $request->member_id;
        $transaksi->user_id = $request->user_id;
        $transaksi->tgl_transaksi = $request->tgl_transaksi;
        $transaksi->diskon = null;
        $transaksi->total_biaya = $request->total_biaya;
        $transaksi->status = $request->status;
        $transaksi->dibayar = $request->dibayar;

        if ($request->has('paket_id') && !empty($request->paket_id)) {
            $transaksi->detailTransaksi()->delete();
            foreach ($request->paket_id as $id) {
                $paket = Paket::find($id);
                if ($paket) {
                    $detail = new DetailTransaksi();
                    $detail->transaksi_id = $transaksi->id;
                    $detail->paket_id = $paket->id;
                    $detail->save();
                }
            }
        }

        if ($request->has('diskon') && $request->diskon != null) {
            preg_match_all('/\d+/', $request->diskon, $matches);
            $diskon_numerik = implode('', $matches[0]);
            $transaksi->diskon = (int) $diskon_numerik;
        }

        $transaksi->save();
    }


    public function destroy($id)
    {
        $data = Transaksi::where('id', $id)->first();
        // dd($data);
        $data->delete();
    }
}
