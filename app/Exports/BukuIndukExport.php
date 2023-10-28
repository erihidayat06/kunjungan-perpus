<?php

namespace App\Exports;

use App\Models\Buku_induk;
use Maatwebsite\Excel\Concerns\FromCollection;

class BukuIndukExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Buku_induk::all();
    }
}
