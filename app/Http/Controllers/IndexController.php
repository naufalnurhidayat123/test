<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Pembayaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cookie;
use Crypt;

class IndexController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::all();
        return view('home', compact('categories'));
    }

    public function back(){
        session()->flush();
        return "/";
    
    }

    public function riwayatTransaksi(){
        if(Cookie::has('riwayat_transaksi')){
            $daftar_riwayat = json_decode(Cookie::get('riwayat_transaksi'),true);
            $id = Crypt::decryptString($daftar_riwayat['id']);
            $data = Pembayaran::with(['ambilJoki'])->where('id', $id)->get();
        }else{
            $data = null;
        }

        return view('invoices',compact('data'));
    }
}
