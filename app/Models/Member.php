<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;

    protected $table = 'member';
    protected $fillable = [
        'kode_member',
        'nama',
        'alamat',
        'tlp',
        'jenis_kelamin',
        'user_id',
    ];
    public function transaksi()
    {
        return $this->hasMany(Transaksi::class);
    }
}
