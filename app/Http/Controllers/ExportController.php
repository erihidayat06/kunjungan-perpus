<?php

namespace App\Http\Controllers;

use App\Exports\BukuIndukExport;
use Illuminate\Http\Request;
use App\Exports\KunjunganExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\KunjunganKaryawanExport;

class ExportController extends Controller
{
    public function exportExcel()
    {
        $data = date('M Y', strtotime(request('filter')));
        return Excel::download(new KunjunganExport, "$data.xlsx");
    }

    public function exportKaryawanExcel()
    {
        $data = date('M Y', strtotime(request('filter')));
        return Excel::download(new KunjunganKaryawanExport, "$data.xlsx");
    }

    public function exportBukuInduk()
    {
        $data = date('M Y');
        return Excel::download(new BukuIndukExport, "$data.xlsx");
    }
}
