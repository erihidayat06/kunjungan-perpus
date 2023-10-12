<?php

namespace App\Http\Controllers;

use App\Models\Kunjungan;
use App\Models\Karyawan;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {

        return view('dashboard.index',[
            'kunjungans' => Kunjungan::hariini()->get(),
            'karyawan' => Karyawan::hariini()->karyawan()->get(),
            'guru' => Karyawan::hariini()->guru()->get(),
            'kunjungans' => Kunjungan::hariini()->get(),
            'baca' => Kunjungan::hariini()->baca()->get()->sum('jumlah'),
            'pinjam' => Kunjungan::hariini()->pinjam()->get()->sum('jumlah'),
            'kembali' => Kunjungan::hariini()->kembali()->get()->sum('jumlah'),
            'tugas' => Kunjungan::hariini()->tugas()->get()
        ]);
    }
}
