<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\User\DashboardApiController;
use App\Http\Controllers\Api\User\PeminjamanApiController;
use App\Http\Controllers\Api\User\PengembalianApiController;
use App\Http\Controllers\Api\User\ProfilApiController;
use App\Http\Controllers\Api\Admin\AdminApiController;
use App\Http\Controllers\Api\Admin\IdentitasApiController;
use App\Http\Controllers\Api\Admin\PemberitahuanApiController;
use App\Http\Controllers\Api\Admin\BukuApiController;
use App\Http\Controllers\Api\Admin\UserApiController;
use App\Http\Controllers\Api\Admin\PenerbitApiController;
use App\Http\Controllers\Api\Admin\KategoriApiController;
use App\Http\Controllers\Api\User\PesanApiController;
use App\Http\Controllers\Api\Admin\PesanApiController as AdminPesanApiController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('/user')->group(function () {

    Route::get('dashboard', [DashboardApiController::class, 'index'])->name('user/dashboard');

    Route::get('peminjaman', [PeminjamanApiController::class, 'index'])->name('user/peminjaman');
    Route::get('form_peminjaman', [PeminjamanApiController::class, 'pinjam'])->name('user/form_pinjam');
    Route::post('form_peminjaman', [PeminjamanApiController::class, 'form'])->name('user/form_peminjaman');
    Route::post('submit_peminjaman', [PeminjamanApiController::class, 'submit'])->name('user/submit_peminjaman');

    Route::get('pengembalian', [PengembalianApiController::class, 'index'])->name('user/pengembalian');
    Route::get('pengembalian_riwayat', [PengembalianApiController::class, 'riwayat'])->name('user/pengembalian_riwayat');
    Route::post('pengembalian_form', [PengembalianApiController::class, 'store'])->name('user/pengembalian_form');


    Route::get('/pesan/terkirim', [PesanApiController::class, 'pesan_terkirim'])->name('user/pesan_terkirim');
    Route::post('/kirim-pesan', [PesanApiController::class, 'kirim_pesan'])->name('user.kirim_pesan');
    Route::get('/pesan/masuk', [PesanApiController::class, 'pesan_masuk'])->name('user/pesan_masuk');
    Route::post('/ubah-status', [PesanApiController::class, 'ubah_status'])->name('user.ubah_status');


    Route::get('profil', [ProfilApiController::class, 'profil'])->name('user/profil');
    Route::put('profil/update', [ProfilApiController::class, 'update'])->name('user/profil_update');
});

Route::prefix('/admin')->group(function () {
    Route::get('dashboard', [AdminApiController::class, 'index'])->name('admin/dashboard');

    Route::get('user', [UserApiController::class, 'user'])->name('admin/user');
    Route::post('user/create', [UserApiController::class, 'create'])->name('admin/user/create');
    Route::put('user/edit/{id}', [UserApiController::class, 'update'])->name('admin/user/edit');
    Route::put('user/verif/{id}', [UserApiController::class, 'verif'])->name('admin/user/verif');
    Route::delete('user/delete/{id}', [UserApiController::class, 'destroy'])->name('admin/user/delete');

    Route::get('admin', [AdminApiController::class, 'admin'])->name('admin/admin');
    Route::post('admin/create', [AdminApiController::class, 'create'])->name('admin/admin/create');
    Route::put('admin/edit/{id}', [AdminApiController::class, 'update'])->name('admin/admin/edit');
    Route::delete('admin/delete/{id}', [AdminApiController::class, 'destroy'])->name('admin/admin/delete');


    Route::get('buku', [BukuApiController::class, 'index'])->name('admin/buku');
    Route::post('buku/create', [BukuApiController::class, 'create'])->name('admin/buku/create');
    Route::put('buku/edit/{id}', [BukuApiController::class, 'update'])->name('admin/buku/edit');
    Route::delete('buku/delete/{id}', [BukuApiController::class, 'destroy'])->name('admin/buku/delete');

    Route::get('penerbit', [PenerbitApiController::class, 'index'])->name('admin/penerbit');
    Route::post('penerbit/create', [PenerbitApiController::class, 'create'])->name('admin/penerbit/create');
    Route::put('penerbit/verif/{id}', [PenerbitApiController::class, 'verif'])->name('admin/penerbit/verif');
    Route::put('penerbit/edit/{id}', [PenerbitApiController::class, 'update'])->name('admin/penerbit/edit');
    Route::delete('penerbit/delete/{id}', [PenerbitApiController::class, 'destroy'])->name('admin/penerbit/delete');

    Route::get('kategori', [KategoriApiController::class, 'index'])->name('admin/kategori');
    Route::post('kategori/create', [KategoriApiController::class, 'create'])->name('admin/kategori/create');
    Route::delete('kategori/delete/{id}', [KategoriApiController::class, 'destroy'])->name('admin/kategori/delete');

    Route::get('laporan', [LaporanApiController::class, 'index'])->name('admin/laporan');
    Route::post('/laporan-pdf', [LaporanApiController::class, 'laporan'])->name('admin.lap_pdf');
    Route::post('/peminjaman', [LaporanApiController::class, 'laporan'])->name('admin/laporan_peminjaman');
    Route::post('/pengembalian', [LaporanApiController::class, 'laporan'])->name('admin.laporan_pengembalian');
    Route::post('/laporan_user', [LaporanApiController::class, 'laporan'])->name('admin.laporan_user');

    Route::get('/pesan/masuk', [AdminPesanApiController::class, 'pesanMasuk'])->name('admin/pesan/masuk');
    Route::post('/admin-status', [AdminPesanApiController::class, 'admin_status'])->name('admin.ubah_status');
    Route::get('/pesan/terkirim', [AdminPesanApiController::class, 'pesanTerkirim'])->name('admin/pesan/terkirim');
    Route::post('/kirim-pesan', [AdminPesanApiController::class, 'kirimPesan'])->name('admin.kirim_pesan');

    Route::get('pemberitahuan', [PemberitahuanApiController::class, 'index'])->name('admin/pemberitahuan');
    Route::post('pemberitahuan/create', [PemberitahuanApiController::class, 'create'])->name('admin/pemberitahuan/create');
    Route::put('pemberitahuan/edit/{id}', [PemberitahuanApiController::class, 'update'])->name('admin/pemberitahuan/edit');
    Route::delete('pemberitahuan/delete/{id}', [PemberitahuanApiController::class, 'destroy'])->name('admin/pemberitahuan/delete');



    Route::get('identitas', [IdentitasApiController::class, 'index'])->name('admin/identitas');
    Route::put('identitas/update', [IdentitasApiController::class, 'update'])->name('admin/identitas/update');
});
