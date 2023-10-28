<?php

use App\Http\Controllers\BukuIndukController;
use App\Models\Ruangan;
use App\Models\Kunjungan;
use App\Models\Karyawan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ExportController;
use App\Http\Controllers\RuanganController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KunjunganController;
use App\Http\Controllers\StatistikController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Kunjungan::whereYear('created_at', '<=', date('Y', strtotime('-3 year')))->delete();
Karyawan::whereYear('created_at', '<=', date('Y', strtotime('-3 year')))->delete();

Route::get('/', [HomeController::class, 'index']);

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');
Route::get('/dashboard/statistik', [StatistikController::class, 'index'])->middleware('auth');
Route::resource('/dashboard/ruangan', RuanganController::class)->middleware('auth');
Route::resource('/kunjungan', KunjunganController::class);
Route::resource('/kunjungan-karyawan', KaryawanController::class);
Route::resource('/dashboard/karyawan', KaryawanController::class)->middleware('auth');
Route::resource('/dashboard/kunjungan', KunjunganController::class)->middleware('auth');
Route::resource('/dashboard/buku-induk', BukuIndukController::class)->middleware('auth');
Route::post('/dashboard/buku-induk/import', [BukuIndukController::class, 'import_excel'])->middleware('auth');

Route::get('/dashboard/export', [ExportController::class, 'exportExcel'])->name('exportExcel');
Route::get('/dashboard/export/excelKaryawan', [ExportController::class, 'exportKaryawanExcel'])->name('exportKaryawanExcel');
Route::get('/dashboard/export/buku-induk', [ExportController::class, 'exportBukuInduk'])->name('exportBukuInduk');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
