<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Transaksi;
use App\Models\DetailTransaksi;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;


class InvoiceController extends Controller
{
    public function show($id)
    {
        $transaksi = Transaksi::where('id', $id)->first();
        $detailTransaksi = DetailTransaksi::where('transaksi_id', $id)->get();
        return view('admin.invoice.generate-invoice', [
            'transaksi' => $transaksi,
            'detailTransaksi' => $detailTransaksi
        ]);
    }

    public function generateInvoice($id)
    {
        $transaksi = Transaksi::where('id', $id)->first();
        $detailTransaksi = DetailTransaksi::where('transaksi_id', $id)->get();

        $data = ['transaksi' => $transaksi, 'detailTransaksi' => $detailTransaksi];

        $pdf = Pdf::loadView('admin.invoice.generate-invoice', $data);
        return $pdf->download('invoice-' . $transaksi->id . '.pdf');
    }
}
