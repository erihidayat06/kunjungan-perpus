<?php

namespace App\Http\Controllers;

use App\Models\Ruangan;
use App\Models\Kunjungan;
use Illuminate\Http\Request;

class HomeController extends Controller
{


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $s1 = 0;
        $s2 = 0;
        if (date('m-d') >= date('m-d', strtotime('0000-07-01')) &&  date('m-d') <= date('m-d', strtotime('0000-12-29'))) {
            $s1 = date('Y');
            $s2 = date('Y', strtotime('+1 year'));
        } elseif (date('m-d') <= date('m-d', strtotime('0000-12-30')) &&  date('m-d') <= date('m-d', strtotime('0000-06-30'))) {
            $s1 = date('Y', strtotime('-1 year'));
            $s2 = date('Y');
        }


        $dari =  "$s1-07-01";
        $sampai = "$s2-07-01";

        $dataKunjungan = Kunjungan::filtertanggal(['dari' => $dari, 'sampai' => $sampai])->get()->unique('nama');

        $data = [];
        foreach ($dataKunjungan as $kunjungan) {
            $data[] = ['nama' => $kunjungan->nama, 'kelas' => $kunjungan->ruangan->nama_kelas, 'jumlah' => count(Kunjungan::where('nama', $kunjungan->nama)->get())];
        }

        return view('index', [
            's1' => $s1,
            's2' => $s2,
            'kelass' => Ruangan::get(),
            'kunjungans' => Kunjungan::get(),
            'peringkats' => collect($data)->sortByDesc('jumlah')
        ]);
    }
}
