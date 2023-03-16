<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paket extends Model
{
    use HasFactory;

    protected $table = 'paket';
    protected $fillable = [
        'outlet_id',
        'jenis',
        'nama_paket',
        'harga'
    ];
    public function transaksi()
    {
        return $this->belongsToMany(Transaksi::class);
    }
    public function outlet()
    {
        return $this->belongsTo(Outlet::class, 'outlet_id', 'id');
    }
}
