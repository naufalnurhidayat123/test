<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaketJoki extends Model
{
    use HasFactory;

    protected $fillable = [
        'rank_awal', 'rank_akhir', 'harga', 'image', 'categories_id', 'paket_joki_id', 'penjoki_id'
    ];

    public function category(){
        return $this->belongsTo(Category::class, 'categories_id');
    }

    public function dataJokis()
    {
        return $this->hasMany(DataJoki::class);
    }

    public function invoice(){
        return $this->hasMany(Pembayaran::class,'id_paket_joki','id');
    }
}
