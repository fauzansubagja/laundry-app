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
            'Nama Member',
            'Jenis Paket',
            'Nama Outlet',
            'Kode Invoice',
            'Total Bayar',
            'Status'
        ];
    }

    public function map($transaksi): array
    {
        return [
            $transaksi->id,
            $transaksi->member->nama, // Ubah member_id menjadi nama anggota
            $transaksi->paket->nama_paket,
            $transaksi->outlet->nama,
            $transaksi->kode_invoice,
            'Rp. ' . number_format($transaksi->total_biaya, 0, ',', '.'),
            $transaksi->status
        ];
    }
}
