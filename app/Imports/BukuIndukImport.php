<?php

namespace App\Imports;

use App\Models\Buku_induk;
use Maatwebsite\Excel\Concerns\ToModel;

class BukuIndukImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Buku_induk([
            'tanggal' => $row[0],
            'asal' => $row[1],
            'pengarang' => $row[2],
            'judul_buku' => $row[3],
            'impresium' => $row[4],
            'jml_jdl' => $row[5],
            'jml_exs' => $row[6],
            'no_inven' => $row[7],
            'no_kelas' => $row[8],
            'bahasa' => $row[9],
            'macam' => $row[10],
            'keterangan' => $row[11],
        ]);
    }
}
