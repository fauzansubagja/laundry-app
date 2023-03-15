<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Member;
use App\Models\Outlet;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('dashboard', [
            'user' => User::all(),
            'member' => Member::all(),
            'members' => Member::count(),
            'outlet' => Outlet::all(),
            'outlets' => Outlet::count(),
            'transaksi' => Transaksi::all(),
            'data' => Transaksi::count(),
            'selesai' => Transaksi::where('status', 'Selesai')->count(),
            'transaksi_baru' => Transaksi::whereIn('status', ['Baru', 'Proses', 'Diambil', 'Dikirim'])->count(),
        ]);
    }
}
