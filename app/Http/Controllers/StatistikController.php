<?php

namespace App\Http\Controllers;

use App\Models\Kunjungan;
use App\Models\Karyawan;
use Illuminate\Http\Request;

class StatistikController extends Controller
{
    public function index()
    {


        for ($i = 1; $i < 4; $i++) {
            $t1 = $i - 1;
            $t2 = $i - 2;
            $d = date('Y', strtotime("-$t1 year"));
            $s = date('Y', strtotime("-$t2 year"));
            $dr =  date('Y', strtotime("-$t1 year")) . "-07-01";
            $sp = date('Y', strtotime("-$t2 year")) . "-07-01";

            $ajaran[] = ['d' => $d, 's' => $s, 'dari' => $dr, 'sampai' => $sp];
        }



        // Kunjungan Berdasarkan Tujuan
        for ($i = 1; $i < 10; $i++) {
            $b[] = Kunjungan::filtertanggal(request(['dari', 'sampai']))->whereMonth('created_at', "0$i")->baca()->get()->sum('jumlah');
            $p[] = Kunjungan::filtertanggal(request(['dari', 'sampai']))->whereMonth('created_at', "0$i")->pinjam()->get()->sum('jumlah');
            $k[] = Kunjungan::filtertanggal(request(['dari', 'sampai']))->whereMonth('created_at', "0$i")->kembali()->get()->sum('jumlah');
            $t[] = Kunjungan::filtertanggal(request(['dari', 'sampai']))->whereMonth('created_at', "0$i")->tugas()->get()->sum('jumlah');
        }

        for ($i = 0; $i < 3; $i++) {
            array_push($b, Kunjungan::filtertanggal(request(['dari', 'sampai']))->whereMonth('created_at', "1$i")->baca()->get()->sum('jumlah'));
            array_push($p, Kunjungan::filtertanggal(request(['dari', 'sampai']))->whereMonth('created_at', "1$i")->pinjam()->get()->sum('jumlah'));
            array_push($k, Kunjungan::filtertanggal(request(['dari', 'sampai']))->whereMonth('created_at', "1$i")->kembali()->get()->sum('jumlah'));
            array_push($t, Kunjungan::filtertanggal(request(['dari', 'sampai']))->whereMonth('created_at', "1$i")->tugas()->get()->sum('jumlah'));
        }

        // Kunjungan Berdasarkan Kelas
        for ($i = 1; $i < 10; $i++) {
            $kls7[] = Kunjungan::filtertanggal(request(['dari', 'sampai']))->whereMonth('created_at', "0$i")->kelas(['kelas' => '7'])->get()->sum('jumlah');
            $kls8[] = Kunjungan::filtertanggal(request(['dari', 'sampai']))->whereMonth('created_at', "0$i")->kelas(['kelas' => '8'])->get()->sum('jumlah');
            $kls9[] = Kunjungan::filtertanggal(request(['dari', 'sampai']))->whereMonth('created_at', "0$i")->kelas(['kelas' => '9'])->get()->sum('jumlah');
        }

        for ($i = 0; $i < 3; $i++) {
            array_push($kls7, Kunjungan::filtertanggal(request(['dari', 'sampai']))->whereMonth('created_at', "1$i")->kelas(['kelas' => '7'])->get()->sum('jumlah'));
            array_push($kls8, Kunjungan::filtertanggal(request(['dari', 'sampai']))->whereMonth('created_at', "1$i")->kelas(['kelas' => '8'])->get()->sum('jumlah'));
            array_push($kls9, Kunjungan::filtertanggal(request(['dari', 'sampai']))->whereMonth('created_at', "1$i")->kelas(['kelas' => '9'])->get()->sum('jumlah'));
        }

        $i7 = 0;
        $i8 = 0;
        $i9 = 0;
        $i10 = 0;
        $i11 = 0;
        $i12 = 0;
        $i13 = 0;

        foreach (Kunjungan::filtertanggal(request(['dari', 'sampai']))->get() as $data) {
            if (date('H', strtotime($data->created_at)) == '07') {
                $i7 = $i7 + 1;
            } elseif (date('H', strtotime($data->created_at)) == '08') {
                $i8 = $i8 + 1;
            } elseif (date('H', strtotime($data->created_at)) == '09') {
                $i9 = $i9 + 1;
            } elseif (date('H', strtotime($data->created_at)) == '10') {
                $i10 = $i10 + 1;
            } elseif (date('H', strtotime($data->created_at)) == '11') {
                $i11 = $i11 + 1;
            } elseif (date('H', strtotime($data->created_at)) == '12') {
                $i12 = $i12 + 1;
            } elseif (date('H', strtotime($data->created_at)) == '13') {
                $i13 = $i13 + 1;
            }
        }

        $jam = [$i7, $i8, $i9, $i10, $i11, $i12, $i13];


        // Kunjungan Berdasarkan Tujuan
        for ($i = 1; $i < 10; $i++) {
            $g[] = count(Karyawan::filtertanggal(request(['dari', 'sampai']))->whereMonth('created_at', "0$i")->guru()->get());
            $kar[] = count(Karyawan::filtertanggal(request(['dari', 'sampai']))->whereMonth('created_at', "0$i")->karyawan()->get());
        }

        for ($i = 0; $i < 3; $i++) {
            array_push($g, count(Karyawan::filtertanggal(request(['dari', 'sampai']))->whereMonth('created_at', "1$i")->guru()->get()));
            array_push($kar, count(Karyawan::filtertanggal(request(['dari', 'sampai']))->whereMonth('created_at', "1$i")->karyawan()->get()));
        }



        return view('dashboard.statistik.index', [

            'kls7' => json_encode($kls7),
            'kls8' => json_encode($kls8),
            'kls9' => json_encode($kls9),
            'b' => json_encode($b),
            'p' => json_encode($p),
            'k' => json_encode($k),
            't' => json_encode($t),
            'g' => json_encode($g),
            'kar' => json_encode($kar),
            'jam' => json_encode($jam),

            'ajarans' => collect(
                $ajaran
            ),
        ]);
    }
}
