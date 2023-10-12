<?php

namespace App\Http\Controllers;

use App\Models\Kunjungan;
use App\Models\Karyawan;
use Illuminate\Http\Request;

class StatistikController extends Controller
{
    public function index()
    {
        // Kunjungan Berdasarkan Tujuan
        for ($i=1; $i < 10; $i++) {
            $b[] = Kunjungan::where('created_at','like', '%' . date("Y-0$i") . '%')->baca()->get()->sum('jumlah');
            $p[] = Kunjungan::where('created_at','like', '%' . date("Y-0$i") . '%')->pinjam()->get()->sum('jumlah');
            $k[] = Kunjungan::where('created_at','like', '%' . date("Y-0$i") . '%')->kembali()->get()->sum('jumlah');
            $t[] = Kunjungan::where('created_at','like', '%' . date("Y-0$i") . '%')->tugas()->get()->sum('jumlah');
        }

        for ($i=0; $i < 3; $i++) {
            array_push($b,Kunjungan::where('created_at','like', '%' . date("Y-1$i") . '%')->baca()->get()->sum('jumlah'));
            array_push($p,Kunjungan::where('created_at','like', '%' . date("Y-1$i") . '%')->pinjam()->get()->sum('jumlah'));
            array_push($k,Kunjungan::where('created_at','like', '%' . date("Y-1$i") . '%')->kembali()->get()->sum('jumlah'));
            array_push($t,Kunjungan::where('created_at','like', '%' . date("Y-1$i") . '%')->tugas()->get()->sum('jumlah'));
        }

        $i7 = 0;
        $i8 = 0;
        $i9 = 0;
        $i10 = 0;
        $i11 = 0;
        $i12 = 0;
        $i13 = 0;

        foreach (Kunjungan::all() as $data) {
            if(date('H', strtotime($data->created_at)) == '07'){
                $i7 = $i7 + 1;
            }elseif (date('H', strtotime($data->created_at)) == '08') {
                $i8 = $i8 + 1;
            }elseif (date('H', strtotime($data->created_at)) == '09') {
                $i9 = $i9 + 1;
            }elseif (date('H', strtotime($data->created_at)) == '10') {
                $i10 = $i10 + 1;
            }elseif (date('H', strtotime($data->created_at)) == '11') {
                $i11 = $i11 + 1;
            }elseif (date('H', strtotime($data->created_at)) == '12') {
                $i12 = $i12 + 1;
            }elseif (date('H', strtotime($data->created_at)) == '13') {
                $i13 = $i13 + 1;
            }
        }

        $jam = [$i7,$i8,$i9,$i10,$i11,$i12,$i13];


        // Kunjungan Berdasarkan Tujuan
        for ($i=1; $i < 10; $i++) {
            $g[] = count(Karyawan::where('created_at','like', '%' . date("Y-0$i") . '%')->guru()->get());
            $kar[] = count(Karyawan::where('created_at','like', '%' . date("Y-0$i") . '%')->karyawan()->get());

        }

        for ($i=0; $i < 3; $i++) {
            array_push($g, count(Karyawan::where('created_at','like', '%' . date("Y-1$i") . '%')->guru()->get()));
            array_push($kar, count(Karyawan::where('created_at','like', '%' . date("Y-1$i") . '%')->karyawan()->get()));

        }



        return view('dashboard.statistik.index',[
            'b' => json_encode($b),
            'p' => json_encode($p),
            'k' => json_encode($k),
            't' => json_encode($t),
            'g' => json_encode($g),
            'kar' => json_encode($kar),
            'jam' => json_encode($jam)
        ]);
    }
}
