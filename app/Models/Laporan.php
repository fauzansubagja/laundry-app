<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    use HasFactory;

    protected $table = 'detail_transaksi';

    public function outlet()
    {
        return $this->belongsTo(Outlet::class);
    }
    public function member()
    {
        return $this->belongsTo(Member::class);
    }
    public function transaksi()
    {
        return $this->belongsTo(Transaksi::class);
    }
    public function paket()
    {
        return $this->belongsTo(Paket::class);
    }
}
