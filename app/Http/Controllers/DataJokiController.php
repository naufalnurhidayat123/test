<?php

namespace App\Http\Controllers;

use App\Models\Penjoki;
use App\Models\Category;
use App\Models\DataJoki;
use App\Models\PaketJoki;
use Illuminate\Http\Request;
use Crypt;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
class DataJokiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function indexUser()
    {
        if (!session()->has('id_kategori') && !session()->has('id_paket') && !session()->has('id_joki')) {
            session()->flash('warning', 'Tolong pilih paket dengan benar');
            return redirect()->route('joki.home');
        }
        $categories = Category::all();
        $paketJokis = PaketJoki::all();
        $penjokis = Penjoki::all();
        $datajoki = DataJoki::all();
        return view('data', compact('datajoki', 'penjokis', 'paketJokis', 'categories'));
    }

    public function index(Request $request)
    {
        if (!session()->has('keyAdmin')) {
            return redirect()->route('admin.login');
        }
        if ($request->input('key')) {
            $keys = $request->input('key');
            $datajoki = DataJoki::
                join('categories', 'data_jokis.categories_id', '=', 'categories.id')->join('penjokis', 'data_jokis.penjoki_id', '=', 'penjokis.id')->where('categories.nama_category', 'like', '%' . $keys . '%')
                ->orWhere(function ($query) use ($keys) {
                    $query->where('penjokis.nama_penjoki', 'LIKE', '%' . $keys . '%')
                        ->orWhere('data_jokis.login_joki', 'LIKE', '%' . $keys . '%')
                        ->orWhere('data_jokis.mode_joki', 'LIKE', '%' . $keys . '%')
                        ->orWhere('data_jokis.akun_joki', 'LIKE', '%' . $keys . '%')
                        ->orWhere('data_jokis.no_wa', 'LIKE', '%' . $keys . '%');
                })->paginate(10);
        } else {
            $datajoki = DataJoki::paginate(10);
        }
        return view('admin.AdminDataJoki.data-datajoki', compact('datajoki'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        sleep(1);
        $request->validate([
            'perspective' => 'required|string|max:255',
            'nama' => 'required|string|max:255',
            'login_joki' => 'required|string|max:255',
            'mode_joki' => 'required|string|in:Solo,Duo,Squad',
            'akun_joki' => 'required|string|max:255',
            'password_joki' => 'required|string',
            'no_wa' => 'required|string|regex:/^\+?62[0-9]{9,15}$/',
        ]);
        $idKategori = Crypt::decryptString(session('id_kategori'));
        $paket_joki_id = Crypt::decryptString(session('id_paket'));
        $penjoki_id = Crypt::decryptString(session('id_joki'));
        $data = [
            'categories_id' => $idKategori,
            'paket_joki_id' => $paket_joki_id,
            'penjoki_id' => $penjoki_id,
            'perspective' => $request->perspective,
            'nama' => $request->nama,
            'login_joki' => $request->login_joki,
            'mode_joki' => $request->mode_joki,
            'akun_joki' => $request->akun_joki,
            'nomor_pesanan' => Str::random(),
            'password_joki' => $request->password_joki,
            'no_wa' => $request->no_wa,
            
        ];
        $dataJoki = DataJoki::create($data);
        $newId = Crypt::encryptString($dataJoki->id);
        if ($dataJoki) {
            return redirect()->route('joki.detailorder', ['id' => $newId]);
        }
    }

    public function insertKategori(Request $request)
    {

        $id_kategori = Crypt::encryptString($request->input('id_kategori'));
        session()->put('id_kategori', $id_kategori);
        return "/paket";
    }


    public function insertPaket(Request $request)
    {
        session(['id_paket' => Crypt::encryptString($request->idPaket)]);
        return "/penjoki";
    }

    public function insertPenjoki(Request $request)
    {
        session(['id_joki' => Crypt::encryptString($request->id_joki)]);
        return "/data";
    }





    /**
     * Display the specified resource.
     */
    public function show(DataJoki $dataJoki)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DataJoki $dataJoki)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DataJoki $dataJoki)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        DataJoki::where('id', $request->id)->delete();
        return redirect()->route('admin.datajoki')->with('deleteDataJoki', 'Berhasil hapus data joki!!');
    }
}
