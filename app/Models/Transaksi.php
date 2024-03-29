<?php

namespace App\Models;

use App\Models\User;
use App\Models\Paket;
use App\Models\Member;
use App\Models\Outlet;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Transaksi extends Model
{
    use HasFactory;
    use SoftDeletes; // tambahkan trait SoftDeletes pada model

    protected $table = 'transaksi';
    protected $fillable = [
        'outlet_id',
        'member_id',
        'user_id',
        'kode_invoice',
        'tgl_transaksi',
        'diskon',
        'total_biaya',
        'status',
        'dibayar',
    ];

    protected $dates = ['deleted_at'];

    public function detailTransaksi()
    {
        return $this->hasMany(DetailTransaksi::class);
    }
    public function outlet()
    {
        return $this->belongsTo(Outlet::class);
    }
    public function member()
    {
        return $this->belongsTo(Member::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function paket()
    {
        return $this->belongsToMany(Paket::class, 'detail_transaksi');
    }

    public function scopeActive($query)
    {
        return $query->whereNull('deleted_at');
    }
}
