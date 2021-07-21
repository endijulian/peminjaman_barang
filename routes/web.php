<?php

use App\Http\Controllers\BarangController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SiswaController;
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
    return redirect('login');
});

Auth::routes(['register' => false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::resource('user', UserController::class);
Route::resource('barang', BarangController::class);

//Jurusan
Route::get('jurusan', [JurusanController::class, 'index'])->name('jurusan.index');
Route::get('jurusan/create', [JurusanController::class, 'create'])->name('jurusan.create');
Route::post('jurusan/store', [JurusanController::class, 'store'])->name('jurusan.store');
Route::put('jurusan/update/{id}', [JurusanController::class, 'update'])->name('jurusan.update');
Route::get('jurusan/edit/{id}', [JurusanController::class, 'edit'])->name('jurusan.edit');
Route::delete('jurusan/destroy/{id}', [JurusanController::class, 'destroy'])->name('jurusan.destroy');

//Peminjaman
Route::get('peminjaman', [PeminjamanController::class, 'index'])->name('peminjaman.index');
Route::get('peminjaman/create', [PeminjamanController::class, 'create'])->name('peminjaman.create');
Route::post('peminjaman/store', [PeminjamanController::class, 'store'])->name('peminjaman.store');
Route::put('peminjaman/update/{id}', [PeminjamanController::class, 'update'])->name('peminjaman.update');
Route::get('peminjaman/edit/{id}', [PeminjamanController::class, 'edit'])->name('peminjaman.edit');
Route::delete('peminjaman/destroy/{id}', [PeminjamanController::class, 'destroy'])->name('peminjaman.destroy');

Route::get('peminjaman/cetakLaporan', [PeminjamanController::class, 'cetakLaporan'])->name('peminjaman.cetakLaporan');
Route::get('peminjaman/cetakLaporanTgl/{tglawal}/{tglakhir}', [PeminjamanController::class, 'cetakLaporanTgl'])->name('peminjaman.cetakLaporanTgl');
