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
        $daysOfWeek = [
            'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'
        ];

        $today = Carbon::today();

        $totalBiayaPerDay = [];

        foreach ($daysOfWeek as $day) {
            $totalBiaya = Transaksi::where('dibayar', 'Dibayar')
                ->whereDate('created_at', $today->copy()->startOfWeek()->modify($day))
                ->sum('total_biaya');

            $totalBiayaPerDay[] = $totalBiaya;
        }
        // dd($totalBiayaPerDay[0]);
        return view('dashboard', [
            'user' => User::all(),
            'member' => Member::all(),
            'members' => Member::count(),
            'outlet' => Outlet::all(),
            'outlets' => Outlet::count(),
            'transaksi' => Transaksi::all(),
            'data' => Transaksi::count(),
            'selesai' => Transaksi::where('status', ['Selesai','Diambil','Dikirim'])->count(),
            'transaksi_baru' => Transaksi::whereIn('status', ['Baru', 'Proses', 'Diambil', 'Dikirim'])->count(),
            'totalBiayaPerDay' => $totalBiayaPerDay,
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
