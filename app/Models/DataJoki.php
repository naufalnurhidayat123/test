<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataJoki extends Model
{
    use HasFactory;

    protected $fillable = [
        'login_joki',
        'perspective',
        'nama',
        'mode_joki',
        'akun_joki',
        'password_joki',
        'nomor_pesanan',
        'no_wa',
        'categories_id',
        'paket_joki_id',
        'penjoki_id'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'categories_id');
    }

    public function paketJoki()
    {
        return $this->belongsTo(PaketJoki::class, 'paket_joki_id');
    }

    public function penjoki()
    {
        return $this->belongsTo(Penjoki::class, 'penjoki_id');
    }
    public function invoice()
    {
        return $this->hasMany(Pembayaran::class, 'id_data_joki','id');
    }
}
