<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HitungController;
use App\Http\Controllers\KriteriaController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\RiwayatController;

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

// // GANTI JADI INI:
// Route::get('/', function () {
//     // Redirect langsung ke route hitung
//     return redirect()->route('hitung.index');
// });

// Route Hitung
Route::get('/hitung', [HitungController::class, 'index'])->name('hitung.index');
Route::post('/hitung', [HitungController::class, 'proses'])->name('hitung.proses');

// Route CRUD
Route::resource('kriteria', KriteriaController::class);
Route::post('/kriteria/proses-ahp', [KriteriaController::class, 'prosesAhp'])->name('kriteria.proses_ahp');
Route::resource('karyawan', KaryawanController::class);

// Route Riwayat
Route::get('/riwayat', [RiwayatController::class, 'index'])->name('riwayat.index');
Route::post('/riwayat', [RiwayatController::class, 'store'])->name('riwayat.store');
Route::get('/riwayat/{id}', [RiwayatController::class, 'show'])->name('riwayat.show');
Route::delete('/riwayat/{id}', [RiwayatController::class, 'destroy'])->name('riwayat.destroy');