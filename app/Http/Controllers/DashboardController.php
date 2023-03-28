<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use App\Models\DetailTransaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class DashboardController extends Controller
{
    public function index()
    {
        // $user_id = Auth::id();

        // $transaksi = Transaksi::where('user_id', $user_id)->first();
        // $detailTransaksi = DetailTransaksi::whereHas('transaksi', function ($query) use ($user_id) {
        //     $query->where('user_id', $user_id);
        // })->get();

        // $member_id = Auth::user()->member_id;
        // $transaksi = Transaksi::where('member_id', $member_id)->get();
        // $detailTransaksi = DetailTransaksi::where('transaksi_id', $transaksi->id)->get();
        // dd($transaksi);
        return view('member.index', [
            // 'transaksi' => $transaksi,
            // 'detailTransaksi' => $detailTransaksi
        ]);
    }
}
