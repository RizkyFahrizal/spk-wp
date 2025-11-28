<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HitungController;
use App\Http\Controllers\KriteriaController;
use App\Http\Controllers\KaryawanController;

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
Route::get('/hitung', [HitungController::class, 'index'])->name('hitung.index');
Route::post('/hitung', [HitungController::class, 'proses'])->name('hitung.proses');
// Route CRUD
Route::resource('kriteria', KriteriaController::class);
Route::resource('karyawan', KaryawanController::class);