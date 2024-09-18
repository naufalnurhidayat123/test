<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['nama_category', 'deskripsi_category','image'];

    public function paketjokis(){
        return $this->hasMany(PaketJoki::class, 'categories_id');
    }

    public function dataJokis()
    {
        return $this->hasMany(DataJoki::class);
    }

}
