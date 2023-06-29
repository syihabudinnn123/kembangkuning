<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Exports\WargaExport;
use App\Exports\PerkebunanExport;
use Maatwebsite\Excel\Facades\Excel;

class ExportController extends Controller
{
    function warga()
    {
        return Excel::download(new WargaExport, 'warga.xlsx');
    }

    function perkebunan()
    {
        return Excel::download(new PerkebunanExport, 'perkebunan.xlsx');
    }
}
