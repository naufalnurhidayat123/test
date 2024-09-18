<?php

namespace App\Http\Controllers;

use App\Models\Penjoki;
use App\Models\Category;
use App\Models\DataJoki;
use App\Models\PaketJoki;
use App\Models\Pembayaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Cookie;

use Crypt;
use Nette\Utils\Random;

class PembayaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     public function index(Request $request){
        if($request->input('key')){
            $data = Pembayaran::whereAny(['price','status'],'LIKE','%'.$request->input('key').'%')->paginate(10);
        }else{

            $data = Pembayaran::paginate(10);
        }
        return view('admin/AdminInvoice/data-invoice',compact('data'));
     }
    public function showOrderDetail($id)
    {
        $newId = Crypt::decryptString($id);
        if(!session()->has(['id_kategori','id_paket','id_joki'])){
            return redirect('/');
        }
        if (empty($newId)) {
            return redirect()->route('joki.data');
        }

        $dataJoki = DataJoki::findOrFail($newId);
        $category = Category::find($dataJoki->categories_id);
        $paketJoki = PaketJoki::find($dataJoki->paket_joki_id);
        $penjoki = Penjoki::find($dataJoki->penjoki_id);


        \Midtrans\Config::$serverKey = 'SB-Mid-server-ib2woTZntlPCEh8InPHUp3nZ';
        \Midtrans\Config::$isProduction = false;
        \Midtrans\Config::$isSanitized = true;
        \Midtrans\Config::$is3ds = true;

        \Midtrans\Config::$curlOptions[CURLOPT_SSL_VERIFYHOST] = 0;
        \Midtrans\Config::$curlOptions[CURLOPT_SSL_VERIFYPEER] = 0;
        \Midtrans\Config::$curlOptions[CURLOPT_HTTPHEADER] = [];

        $number = $dataJoki->paketJoki->harga ;
        $hargaToken = str_replace('.', '', $number);
        $params = array(
            'transaction_details' => array(
                'order_id' =>  rand(),
                'gross_amount' => $hargaToken,
            )
        );
        $snapToken = \Midtrans\Snap::getSnapToken($params);
        $insertPay = Pembayaran::create([
            'id_data_joki'=>$dataJoki->id,
            'id_paket_joki'=>$dataJoki->paket_joki_id,
            'price'=>$dataJoki->paketJoki->harga,
            'status'=>'Pending',
            'snap_token'=>$snapToken
        ]);

        $id_invoice=Crypt::encryptString($insertPay->id);;
        return view('detail_order', compact('dataJoki', 'category', 'paketJoki', 'penjoki','snapToken','id_invoice'));
    }

    public function sukses(Request $request)
    {
        $id =$request->input('id_invoice');

        $data = ['id'=>$id];
        $transaksiJson = json_encode($data);
        Cookie::queue(Cookie::make('riwayat_transaksi',$transaksiJson,60));

        $idDec = Crypt::decryptString($request->input('id_invoice'));
        $updateInvoice = Pembayaran::where('id', $idDec)->update([
            'status' => 'sukses'
        ]);
        Session::flush();
        return response()->json(['url'=>'/mantap','token'=>$id]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function kirimBukti($id)
    {
        $dataPenjoki = Penjoki::all();
        $newId = Crypt::decryptstring($id);
        $data = ['data'=>Pembayaran::with(['ambilpaket','ambilJoki'])->where('id',$newId)->first(),'dataPenjoki'=>$dataPenjoki];
        $anyar = $data['data'];
        // dd($anyar->ambilpaket->rank);
        return view('sukses',$data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Pembayaran $pembayaran)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pembayaran $pembayaran)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pembayaran $pembayaran)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Pembayaran::where('id',$id)->delete();
        return redirect()->to('admin/data-invoice');
    }
}
