<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Category;
use App\Models\PaketJoki;
use Crypt;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class LoginAdmin extends Controller
{
    public function index()
    {
        if (session()->has('keyAdmin')) {
            return redirect()->route('admin.dashboard');
        }
        return view('admin/loginAdmin');
    }

    public function login(Request $request)
    {
        $username = $request->username;
        $password = $request->password;

        $data = Admin::where('username', '=', $username)->get();
        if (count($data) == 0) {
            session()->flash('fail', 'Maaf Username atau Password salah');
            return view('admin/loginAdmin');
        }
        $kocak = $data[0];
        if ($kocak->password == $password) {
            Session::put('keyAdmin','ini token');
            $categories = Category::all();
            $paketjoki = PaketJoki::all();
            return redirect('admin/dashboard');
        }
        session()->flash('fail', 'Maaf Username atau Password salah');
        return view('admin/loginAdmin');
    }

    public function logout(){
        Session::forget('keyAdmin');
        return view('admin/loginAdmin');
    }
}
