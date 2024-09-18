<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    use HasFactory;
    protected $table = "pembayaran";

    protected $fillable = [
        'id_data_joki',
        'id_paket_joki',
        'price',
        'status',
        'snap_token',
    ];

    public function ambilpaket()
    {
        return $this->belongsTo(PaketJoki::class, 'id_paket_joki', 'id');
    }
    public function ambilJoki()
    {
        return $this->belongsTo(DataJoki::class, 'id_data_joki', 'id');
    }
}
