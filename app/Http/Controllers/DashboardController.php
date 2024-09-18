<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\PaketJoki;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        if (!session()->has('keyAdmin')) {
            return redirect()->route('admin.login');
        }
        
        $categories = Category::all();
        $paketjoki = PaketJoki::all();

        return view('admin.dashboard', compact('categories', 'paketjoki'));
    }
}
