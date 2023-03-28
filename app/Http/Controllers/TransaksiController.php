<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Paket;
use App\Models\Member;
use App\Models\Outlet;
use App\Models\Transaksi;
use App\Models\DetailTransaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

        // mengirim data user berdasarkan user yang sedang login
        $user = Auth::user();
        $userData = User::where('id', $user->id)->first();

        // mengirim data paket berdasarkan outlet yang dipilih
        $outlet_id = Auth::user()->outlet_id;
        $paket = Paket::where('outlet_id', $outlet_id)->get();

        // dd($userData);
        return view('admin.transaksi.create', [
            'tgl_transaksi' => $tgl_transaksi,
            'kode_invoice' => $kode_invoice,
            'userData' => $userData,
            'paket' => $paket,
            'transaksi' => Transaksi::all(),
            'member' => Member::all(),
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

        $transaksi = Transaksi::create($data);

        if ($request->has('paket_id') && !empty($request->paket_id)) {
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

            $data['diskon'] = (int) $diskon_numerik;
        }

        $transaksi->update($data);
    }


    public function edit($id)
    {
        // mengirim data user berdasarkan user yang sedang login
        $user = Auth::user();
        $userData = User::where('id', $user->id)->first();

        // mengirim data paket berdasarkan outlet yang dipilih
        $outlet_id = Auth::user()->outlet_id;
        $paket = Paket::where('outlet_id', $outlet_id)->get();

        $detailTransaksi = DetailTransaksi::where('transaksi_id', $id)->get();

        $paketTerpilih = [];
        foreach ($detailTransaksi as $detail) {
            $paketTerpilih[] = $detail->paket_id;
        }

        return view('admin.transaksi.edit', [
            'transaksi' => Transaksi::where('id', $id)->first(),
            'transaksis' => Transaksi::find($id),
            'outlet' => Outlet::all(),
            'user' => User::all(),
            'member' => Member::all(),
            'paket' => Paket::all(),
            'userData' => $userData,
            'paket' => $paket,
            'paketTerpilih' => $paketTerpilih,
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
        // dd($data);
        $data = Transaksi::findOrFail($id);
        $data->deleted_at = now();
        $data->save();
    }
}
