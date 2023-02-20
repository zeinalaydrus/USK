<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\User\DashboardController;
use App\Http\Controllers\User\PeminjamanController;
use App\Http\Controllers\User\PengembalianController;
use App\Http\Controllers\User\ProfilController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\IdentitasController;
use App\Http\Controllers\Admin\PemberitahuanController;
use App\Http\Controllers\Admin\BukuController;
use App\Http\Controllers\Admin\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('/user')->group(function () {

    Route::get('dashboard', [DashboardController::class, 'index'])->name('user/dashboard');

    Route::get('peminjaman', [PeminjamanController::class, 'index'])->name('user/peminjaman');
    Route::get('form_peminjaman', [PeminjamanController::class, 'pinjam'])->name('user/form_pinjam');
    Route::post('form_peminjaman', [PeminjamanController::class, 'form'])->name('user/form_peminjaman');
    Route::post('submit_peminjaman', [PeminjamanController::class, 'submit'])->name('user/submit_peminjaman');

    Route::get('pengembalian', [PengembalianController::class, 'index'])->name('user/pengembalian');
    Route::get('pengembalian_riwayat', [PengembalianController::class, 'riwayat'])->name('user/pengembalian_riwayat');
    Route::post('pengembalian_form', [PengembalianController::class, 'store'])->name('user/pengembalian_form');


    Route::get('/pesan/masuk', [PesanController::class, 'index'])->name('user/pesan/masuk');
    Route::get('/pesan/terkirim', [PesanController::class, 'terkirim'])->name('user/pesan/terkirim');
    Route::post('/pesan/masuk/ubah_status', [PesanController::class, 'update'])->name('user/pesan/masuk/update');
    Route::post('/pesan/kirim', [PesanController::class, 'store'])->name('user/pesan/kirim');
    Route::delete('/pesan/delete/{id}', [PesanController::class, 'destroy'])->name('user/pesan/delete');


    Route::get('profil', [ProfilController::class, 'profil'])->name('user/profil');
    Route::put('profil/update', [ProfilController::class, 'update'])->name('user/profil_update');
});

Route::prefix('/admin')->group(function () {
    Route::get('dashboard', [AdminController::class, 'index'])->name('admin/dashboard');

    Route::get('user', [UserController::class, 'user'])->name('admin/user');
    Route::post('user/create', [UserController::class, 'create'])->name('admin/user/create');
    Route::put('user/edit/{id}', [UserController::class, 'update'])->name('admin/user/edit');
    Route::delete('user/delete/{id}', [UserController::class, 'destroy'])->name('admin/user/delete');

    Route::get('admin', [AdminController::class, 'admin'])->name('admin/admin');
    Route::post('admin/create', [AdminController::class, 'create'])->name('admin/admin/create');
    Route::put('admin/edit/{id}', [AdminController::class, 'update'])->name('admin/admin/edit');
    Route::delete('admin/delete/{id}', [AdminController::class, 'destroy'])->name('admin/admin/delete');


    Route::get('buku', [BukuController::class, 'index'])->name('admin/buku');
    Route::post('buku/create', [BukuController::class, 'create'])->name('admin/buku/create');
    Route::put('buku/edit/{id}', [BukuController::class, 'update'])->name('admin/buku/edit');
    Route::delete('buku/delete/{id}', [BukuController::class, 'destroy'])->name('admin/buku/delete');

    Route::get('pemberitahuan', [PemberitahuanController::class, 'index'])->name('admin/pemberitahuan');
    Route::post('pemberitahuan/create', [PemberitahuanController::class, 'create'])->name('admin/pemberitahuan/create');
    Route::put('pemberitahuan/edit/{id}', [PemberitahuanController::class, 'update'])->name('admin/pemberitahuan/edit');
    Route::delete('pemberitahuan/delete/{id}', [PemberitahuanController::class, 'destroy'])->name('admin/pemberitahuan/delete');

    Route::get('identitas', [IdentitasController::class, 'index'])->name('admin/identitas');
    Route::put('identitas/update', [IdentitasController::class, 'update'])->name('admin/identitas/update');
});
