<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Member;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use App\Models\DetailTransaksi;

class MemberController extends Controller
{
    public function index()
    {
        return view('admin.pelanggan.pelanggan')->with([
            'transaksi' => Transaksi::all(),
            'user' => User::all(),
            'member' => Member::all(),
        ]);
    }
    public function detail($id)
    {
        $transaksi = Transaksi::where('id', $id)->first();
        $detailTransaksi = DetailTransaksi::where('transaksi_id', $id)->get();
        return view('admin.pelanggan.ketPesanan', [
            'transaksi' => $transaksi,
            'detailTransaksi' => $detailTransaksi
        ]);
    }
}
