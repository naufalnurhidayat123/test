<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\PaketJoki;
use App\Models\DataJoki;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Crypt;
class PaketJokiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if (!session()->has('keyAdmin')) {
            return redirect()->route('admin.login');
        }
        $categoryId = $request->input('categories_id');

        $query = DB::table('paket_jokis')
            ->join('categories', 'paket_jokis.categories_id', '=', 'categories.id')
            ->select('paket_jokis.*', 'categories.nama_category as nama_category');

        if ($categoryId) {
            $query->where('categories_id', $categoryId);
        }


        $paketjokis = $query->get();
        if ($request->input('key')) {
            $categories = Category::with('paketjokis')->whereAny(['nama_category'], 'LIKE', '%' . $request->input('key') . '%')->get();
        } else {

            $categories = Category::with('paketjokis')->get();
        }

        return view('admin.AdminPaketJoki.data-paketjoki', compact('paketjokis', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::latest()->get();
        return view('admin.AdminPaketJoki.create-paketjoki', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'categories_id' => 'required|exists:categories,id',
            'rank_awal' => 'required',
            'rank_akhir' => 'required',
            'harga' => 'required',
        ], [
            'image.required' => 'Foto wajib di isi!!',
            'categories_id.required' => 'Kategori wajib di isi!!',
            'rank_awal.required' => 'Rank awal wajib di isi!!',
            'rank_akhir.required' => 'Rank tujuan wajib di isi!!',
            'harga.required' => 'Harga wajib di isi!!',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
        }

        PaketJoki::create([
            'image' => $imagePath,
            'categories_id' => $request->categories_id,
            'rank_awal' => $request->rank_awal,
            'rank_akhir' => $request->rank_akhir,
            'harga' => $request->harga,
        ]);

        return redirect()->route('admin.paketjoki')->with('success', 'Paket Joki berhasil ditambahkan!!');
    }

    /**
     * Display the specified resource.
     */
    public function detail($id)
    {
        $categories = Category::findOrFail($id);
        $paketjoki = PaketJoki::where('categories_id', $id)->get();

        return view('admin.AdminPaketJoki.detail-paketjoki', compact('categories', 'paketjoki'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $categories = Category::all();
        $paketjoki = PaketJoki::findOrFail($id);
        return view('admin.AdminPaketJoki.edit-paketjoki', compact('categories', 'paketjoki'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'categories_id' => 'required|exists:categories,id',
            'rank_awal' => 'required',
            'rank_akhir' => 'required',
            'harga' => 'required',
        ]);

        $paketjoki = PaketJoki::where('id', $id)->first();

        $imagePath = $paketjoki->image;
        if ($request->hasFile('image')) {
            if (Storage::exists('public/' . $imagePath)) {
                Storage::delete('public/' . $imagePath);
            }
            $imagePath = $request->file('image')->store('images', 'public');
        }

        PaketJoki::where('id', $request->id)->update([
            'image' => $imagePath,
            'categories_id' => $request->categories_id,
            'rank_awal' => $request->rank_awal,
            'rank_akhir' => $request->rank_akhir,
            'harga' => $request->harga,
        ]);

        return redirect()->route('admin.paketjoki')->with('success', 'Data berhasil di update!!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PaketJoki $paketJoki)
    {
        //
    }

    // User
    public function paketUser()
    {
        if (!session()->has('id_kategori')) {
            session()->flash('warning', 'Tolong pilih paket dengan benar');
            return redirect()->route('joki.home');
        }
        $id = Crypt::decryptString(session('id_kategori'));
        $categories = Category::with('paketjokis')->findOrFail($id);
        return view('paketjoki', compact('categories'));
    }

    public function back()
    {
        session()->forget('id_paket');
        return "/paket";
    }
}
