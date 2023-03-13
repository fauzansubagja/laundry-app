<?php

namespace App\Http\Controllers;

use App\Models\Paket;
use App\Models\Member;
use App\Models\Outlet;
use App\Models\Laporan;
use App\Models\Transaksi;
use App\Exports\LaporanExport;
use Maatwebsite\Excel\Facades\Excel;

class LaporanController extends Controller
{
    public function index()
    {
        return view('admin.laporan.index', [
            'laporan' => Laporan::all(),
            'transaksi' => Transaksi::all(),
            'paket' => Paket::all(),
            'outlet' => Outlet::all(),
            'member' => Member::all(),
        ]);
    }

    public function export()
    {
        return Excel::download(new LaporanExport, 'laporan.xlsx');
    }
}
