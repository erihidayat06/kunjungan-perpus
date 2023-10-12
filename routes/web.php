<?php

use App\Models\Ruangan;
use App\Models\Kunjungan;
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

Route::get('/', function () {



    $dari =  '2023-08-01';
    $sampai = '2024-08-01';

    $dataKunjungan = Kunjungan::filtertanggal(['dari' => $dari,'sampai' => $sampai])->get()->unique('nama');

    foreach ($dataKunjungan as $kunjungan) {
        $data[] = ['nama' => $kunjungan->nama,'kelas' => $kunjungan->ruangan->nama_kelas, 'jumlah' => count(Kunjungan::where('nama', $kunjungan->nama)->get())];
    }

    return view('index',[
        'kelass' => Ruangan::get(),
        'kunjungans' => Kunjungan::get(),
        'peringkats' => collect($data)->sortByDesc('jumlah')
    ]);
});

Route::get('/dashboard', [DashboardController::class,'index'])->middleware('auth');
Route::get('/dashboard/statistik', [StatistikController::class,'index'])->middleware('auth');
Route::resource('/dashboard/ruangan', RuanganController::class)->middleware('auth');
Route::resource('/kunjungan', KunjunganController::class);
Route::resource('/kunjungan-karyawan', KaryawanController::class);
Route::resource('/dashboard/karyawan', KaryawanController::class)->middleware('auth');
Route::resource('/dashboard/kunjungan', KunjunganController::class)->middleware('auth');

Route::get('/dashboard/export', [ExportController::class, 'exportExcel'])->name('exportExcel');
Route::get('/dashboard/export/excelKaryawan', [ExportController::class, 'exportKaryawanExcel'])->name('exportKaryawanExcel');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
