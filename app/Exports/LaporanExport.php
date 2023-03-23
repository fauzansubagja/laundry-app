<?php

namespace App\Exports;

use App\Models\Transaksi;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;


class LaporanExport implements FromCollection, WithHeadings, ShouldAutoSize, WithMapping
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Transaksi::all();
    }

    public function headings(): array
    {
        return [
            'No',
            'Nama Outlet',
            'Kode Invoice',
            'Nama Member',
            'Tanggal Transaksi',
            'Total Bayar',
            'Pegawai'
        ];
    }

    public function map($transaksi): array
    {
        return [
            $transaksi->id,
            $transaksi->outlet->nama,
            $transaksi->kode_invoice,
            $transaksi->member->nama,
            $transaksi->tgl_transaksi,
            'Rp. ' . number_format($transaksi->total_biaya, 0, ',', '.'),
            $transaksi->user->name
        ];
    }
}
