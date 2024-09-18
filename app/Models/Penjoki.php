<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penjoki extends Model
{
    use HasFactory;

    protected $fillable = [
        'image', 'nama_penjoki', 'achievement_penjoki', 'rank_penjoki', 'kd_penjoki', 'match_penjoki',
    ];

    public function dataJokis()
    {
        return $this->hasMany(DataJoki::class);
    }
}
