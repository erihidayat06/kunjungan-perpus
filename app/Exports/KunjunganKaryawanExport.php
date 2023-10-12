<?php

namespace App\Exports;

use App\Models\Karyawan;
use Maatwebsite\Excel\Concerns\FromCollection;

class KunjunganKaryawanExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $i = 1;
        foreach (Karyawan::tanggal(request('filter'))->filtertanggal(request(['dari','sampai']))->get() as $data) {
            $karyawan[] = ['no'=> $i++,'nama' => $data->nama, 'jabatan' => $data->jabatan ,'tujuan' => $data->tujuan ];
        }

        if (isset($karyawan)) {
            $karyawan = collect($karyawan);
            return $karyawan;
        }


        return Karyawan::tanggal(request('filter'))->filtertanggal(request(['dari','sampai']))->get();

    }
}
