<?php

namespace App\Models;

use App\Models\User;
use App\Models\Paket;
use App\Models\Member;
use App\Models\Outlet;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Transaksi extends Model
{
    use HasFactory;

    protected $table = 'transaksi';
    protected $fillable = [
        'outlet_id',
        'member_id',
        'user_id',
        'paket_id',
        'kode_invoice',
        'tgl_transaksi',
        'diskon',
        'total_biaya',
        'status',
        'dibayar',
    ];
    protected $primaryKey = 'kode_invoice';

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->{$model->getKeyName()} = 'INV-' . date('YmdHis');
        });
    }
    public function outlet()
    {
        return $this->belongsTo(Outlet::class);
        return $this->hashOne(Outlet::class);
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
        return $this->belongsTo(Paket::class);
    }
}
