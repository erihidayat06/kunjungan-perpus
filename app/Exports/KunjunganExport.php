<?php

namespace App\Exports;

use App\Models\Kunjungan;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Http\Request;

class KunjunganExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $i = 1;
        foreach (Kunjungan::tanggal(request('filter'))->filtertanggal(request(['dari','sampai']))->get() as $data) {
            $kunjungan[] = ['no'=> $i++,'nama' => $data->nama, 'tujuan' => $data->tujuan, 'kelas' => $data->ruangan->nama_kelas, 'jumlah' => $data->jumlah];
        }

        if (isset($kunjungan)) {
            $kunjungan = collect($kunjungan);
            return $kunjungan;
        }


        return Kunjungan::tanggal(request('filter'))->filtertanggal(request(['dari','sampai']))->get();


    }
}
