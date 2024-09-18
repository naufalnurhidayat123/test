<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\PaketJoki;
use App\Models\Penjoki;
use App\Models\DataJoki;
use Illuminate\Http\Request;

class PenjokiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if (!session()->has('keyAdmin')) {
            return redirect()->route('admin.login');
        }
        if ($request->input('key')) {
            $penjoki = Penjoki::whereAny(['nama_penjoki', 'achievement_penjoki', 'rank_penjoki', 'kd_penjoki', 'match_penjoki'], 'LIKE', '%' . $request->input('key') . '%')->paginate(15);
        } else {
            $penjoki = Penjoki::paginate(15);
        }
        return view('admin.AdminPenjoki.data-penjoki', compact('penjoki'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.AdminPenjoki.create-penjoki');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'nama_penjoki' => 'required|string',
            'achievement_penjoki' => 'required',
            'rank_penjoki' => 'required',
            'kd_penjoki' => 'required',
            'match_penjoki' => 'required',
        ], [
            'image.required' => 'Foto harus di isi!!',
            'nama_penjoki.required' => 'Nama penjoki harus di isi!!',
            'achievement_penjoki.required' => 'Achievement penjoki harus di isi!!',
            'rank_penjoki.required' => 'Rank penjoki harus di isi!!',
            'kd_penjoki.required' => 'KD penjoki harus di isi!!',
            'match_penjoki.required' => 'Match penjoki harus di isi!!',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
        }

        Penjoki::create([
            'image' => $imagePath,
            'nama_penjoki' => $request->nama_penjoki,
            'achievement_penjoki' => $request->achievement_penjoki,
            'rank_penjoki' => $request->rank_penjoki,
            'kd_penjoki' => $request->kd_penjoki,
            'match_penjoki' => $request->match_penjoki,
        ]);

        return redirect()->route('admin.penjoki')->with('success', 'Data Berhasil di tambahkan!!');
    }

    /**
     * Display the specified resource.
     */
    public function detail($id)
    {
        $penjoki = Penjoki::findOrFail($id);
        return view('admin.AdminPenjoki.detail-penjoki', compact('penjoki'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $penjoki = Penjoki::findOrFail($id);
        return view('admin.AdminPenjoki.edit-penjoki', compact('penjoki'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Penjoki $penjoki)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        Penjoki::where('id', $request->id)->delete();
        return redirect()->route('admin.penjoki')->with('deleteData', 'Data berhasil di hapus!!');
    }

    public function penjokiUser()
    {
        if (!session()->has('id_kategori') && !session()->has('id_paket')) {
            session()->flash('warning', 'Tolong pilih paket dengan benar');
            return redirect()->route('joki.home');
        }
        $penjoki = Penjoki::all();
        return view('penjoki', compact('penjoki'));
    }


}
