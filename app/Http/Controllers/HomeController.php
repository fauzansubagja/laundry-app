<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Member;
use App\Models\Outlet;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

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
        // mengambil data dari senin-minggu
        // $totalBiayaSenin = Transaksi::where('status', 'Selesai')
        //     ->whereDay('created_at', '=', 'Monday')
        //     ->sum('total_biaya');

        // $totalBiayaSelasa = Transaksi::where('status', 'Selesai')
        //     ->whereDay('created_at', '=', 'Tuesday')
        //     ->sum('total_biaya');

        // $totalBiayaRabu = Transaksi::where('status', 'Selesai')
        //     ->whereDay('created_at', '=', 'Wednesday')
        //     ->sum('total_biaya');

        // $totalBiayaKamis = Transaksi::where('status', 'Selesai')
        //     ->whereDay('created_at', '=', 'Thursday')
        //     ->sum('total_biaya');

        // $totalBiayaJumat = Transaksi::where('status', 'Selesai')
        //     ->whereDay('created_at', '=', 'Friday')
        //     ->sum('total_biaya');

        // $totalBiayaSabtu = Transaksi::where('status', 'Selesai')
        //     ->whereDay('created_at', '=', 'Saturday')
        //     ->sum('total_biaya');

        // $totalBiayaMinggu = Transaksi::where('status', 'Selesai')
        //     ->whereDay('created_at', '=', 'Sunday')
        //     ->sum('total_biaya');

        $daysOfWeek = [
            'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'
        ];

        $today = Carbon::today();

        $totalBiayaPerDay = [];

        foreach ($daysOfWeek as $day) {
            $totalBiaya = Transaksi::where('status', 'Selesai')
                ->whereDate('created_at', $today->copy()->startOfWeek()->modify($day))
                ->sum('total_biaya');

            $totalBiayaPerDay[] = $totalBiaya;
        }

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
            'totalBiaya' => $totalBiaya,
            // 'totalBiayaSenin' => $totalBiayaSenin,
            // 'totalBiayaSelasa' => $totalBiayaSelasa,
            // 'totalBiayaRabu' => $totalBiayaRabu,
            // 'totalBiayaKamis' => $totalBiayaKamis,
            // 'totalBiayaJumat' => $totalBiayaJumat,
            // 'totalBiayaSabtu' => $totalBiayaSabtu,
            // 'totalBiayaMinggu' => $totalBiayaMinggu,
        ]);
    }
}
