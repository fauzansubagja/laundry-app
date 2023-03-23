<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    use HasFactory;

    protected $table = 'transaksi';

    public function outlet()
    {
        return $this->belongsTo(Outlet::class);
    }
    public function member()
    {
        return $this->belongsTo(Member::class);
    }
    public function paket()
    {
        return $this->belongsTo(Paket::class);
    }
}
