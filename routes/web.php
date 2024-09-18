<?php

use App\Models\Pembayaran;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\PenjokiController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DataJokiController;
use App\Http\Controllers\PaketJokiController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\LoginAdmin;

Route::get('/', [IndexController::class, 'index'])->name('joki.home');
Route::get('pengguna/invoices', [IndexController::class, 'riwayatTransaksi'])->name('joki.riwayat');
Route::get('/back/home', [IndexController::class, 'back'])->name('joki.backHome');
Route::get('/about', [AboutController::class, 'index'])->name('joki.about');
Route::get('/paket', [PaketJokiController::class, 'paketUser'])->name('joki.paket');
Route::get('/back/paket', [PaketJokiController::class, 'back'])->name('joki.backHome');
Route::get('/penjoki', [PenjokiController::class, 'penjokiUser'])->name('joki.penjoki');
Route::get('/data', [DataJokiController::class, 'indexUser'])->name('joki.data');
Route::post('/data/store', [DataJokiController::class, 'store'])->name('datajoki.store');
Route::post('/sukses', [PembayaranController::class, 'sukses'])->name('datajoki.sukses');
Route::get('/mantap/{id}', [PembayaranController::class, 'kirimBukti']);

Route::get('/detail_order/{id}', [PembayaranController::class, 'showOrderDetail'])->name('joki.detailorder');
Route::post('/paket', [DataJokiController::class, 'insertPaket'])->name('joki.postPaket');
Route::post('/penjoki', [DataJokiController::class, 'insertPenjoki'])->name('joki.postPenjoki');


// Admin
Route::get('admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
Route::get('admin/login', [LoginAdmin::class, 'index'])->name('admin.login');
Route::post('admin/prosesLogin', [LoginAdmin::class, 'login'])->name('admin.proses.login');
Route::get('admin/logout', [LoginAdmin::class, 'logout'])->name('admin.proses.logout');
// Routes Category

Route::get('admin/data-category', [CategoryController::class, 'index'])->name('admin.category');
Route::post('admin/data-category', [CategoryController::class, 'index'])->name('admin.searchCartegory');
Route::get('admin/data-category/create', [CategoryController::class, 'create'])->name('admin.category.create');
Route::post('admin/data-category/store', [CategoryController::class, 'store'])->name('admin.category.store');
Route::get('admin/data-category/edit/{id}', [CategoryController::class, 'edit'])->name('admin.category.edit');
Route::post('admin/data-category/update/{id}', [CategoryController::class, 'update'])->name('admin.category.update');
Route::get('admin/data-category/delete/{id}', [CategoryController::class, 'destroy'])->name('admin.category.delete');
Route::post('admin/data-insertJoki', [DataJokiController::class, 'insertKategori'])->name('admin.insertKategori');


// Routes Paket Joki
Route::get('admin/data-paket-joki', [PaketJokiController::class, 'index'])->name('admin.paketjoki');
Route::post('admin/data-paket-joki', [PaketJokiController::class, 'index'])->name('admin.searchPaketjoki');
Route::get('admin/data-paket-joki/create', [PaketJokiController::class, 'create'])->name('admin.paketjoki.create');
Route::post('admin/data-paket-joki/store', [PaketJokiController::class, 'store'])->name('admin.paketjoki.store');
Route::get('admin/data-paket-joki/edit/{id}', [PaketJokiController::class, 'edit'])->name('admin.paketjoki.edit');
Route::post('admin/data-paket-joki/update/{id}', [PaketJokiController::class, 'update'])->name('admin.paketjoki.update');
Route::get('admin/paketjoki/detail/{id}', [PaketJokiController::class, 'detail'])->name('admin.paketjoki.detail');

// Routes Penjoki
Route::get('admin/data-penjoki', [PenjokiController::class, 'index'])->name('admin.penjoki');
Route::post('admin/data-penjoki', [PenjokiController::class, 'index'])->name('admin.searchPenjoki');
Route::get('admin/data-penjoki/create', [PenjokiController::class, 'create'])->name('admin.penjoki.create');
Route::post('admin/data-penjoki/store', [PenjokiController::class, 'store'])->name('admin.penjoki.store');
Route::get('admin/data-penjoki/edit/{id}', [PenjokiController::class, 'edit'])->name('admin.penjoki.edit');
Route::post('admin/data-penjoki/update/{id}', [PenjokiController::class, 'update'])->name('admin.penjoki.update');
Route::get('admin/data-penjoki/destroy/{id}', [PenjokiController::class, 'destroy'])->name('admin.penjoki.destroy');
Route::get('admin/data-penjoki/detail/{id}', [PenjokiController::class, 'detail'])->name('admin.penjoki.detail');

// Routes Akun Joki
Route::get('admin/data-datajoki', [DataJokiController::class, 'index'])->name('admin.datajoki');
Route::post('admin/data-datajoki', [DataJokiController::class, 'index'])->name('admin.searchDatajoki');
Route::get('admin/data-datajoki/destroy/{id}', [DataJokiController::class, 'destroy'])->name('admin.datajoki.destroy');

Route::get('admin/data-invoice', [PembayaranController::class, 'index'])->name('admin.dataInvoice');
Route::post('admin/data-invoice', [PembayaranController::class, 'index'])->name('admin.searchDataInvoice');
Route::get('admin/data-invoice/delete/{id}', [PembayaranController::class, 'destroy'])->name('admin.dataInvoice.delete');