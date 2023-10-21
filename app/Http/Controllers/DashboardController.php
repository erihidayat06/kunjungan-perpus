<?php

namespace App\Http\Controllers;

use App\Models\Kunjungan;
use App\Models\Karyawan;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {

        $kls7 = Kunjungan::hariini()->kelas(['kelas' => '7'])->get()->sum('jumlah');
        $kls8 = Kunjungan::hariini()->kelas(['kelas' => '8'])->get()->sum('jumlah');
        $kls9 = Kunjungan::hariini()->kelas(['kelas' => '9'])->get()->sum('jumlah');

        return view('dashboard.index', [
            'kls7' => $kls7,
            'kls8' => $kls8,
            'kls9' => $kls9,
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
