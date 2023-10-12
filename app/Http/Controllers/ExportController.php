<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\KunjunganExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\KunjunganKaryawanExport;

class ExportController extends Controller
{
    Public function exportExcel()
    {
        $data = date('M Y', strtotime(request('filter')));
        return Excel::download(new KunjunganExport, "$data.xlsx");

    }

    Public function exportKaryawanExcel()
    {
        $data = date('M Y', strtotime(request('filter')));
        return Excel::download(new KunjunganKaryawanExport, "$data.xlsx");

    }
}
