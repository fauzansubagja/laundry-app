<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Paket;
use App\Models\Member;
use App\Models\Outlet;
use App\Models\Laporan;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use App\Exports\LaporanExport;
use Maatwebsite\Excel\Facades\Excel;

class LaporanController extends Controller
{
    public function index()
    {
        return view('admin.laporan.index', [
            'transaksi' => Transaksi::all(),
            'paket' => Paket::all(),
            'outlet' => Outlet::all(),
            'member' => Member::all(),
            'user' => User::all(),
        ]);
    }

    public function export()
    {
        return Excel::download(new LaporanExport, 'laporan.xlsx');
    }

    public function updateStatus(Request $request, $id)
    {
        $transaksi = Transaksi::findOrFail($id);
        $status = $request->input('status');

        $transaksi->status = $status;
        // dd($request->all());
        $transaksi->save();

        return redirect('/pesanan');
    }

    public function deleteView(Request $request, $id)
    {
        $data = Transaksi::findOrFail($id);
        $data->deleted_at = now();
        $data->save();
    }
}
