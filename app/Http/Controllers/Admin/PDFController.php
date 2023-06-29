<?php

namespace App\Http\Controllers\Admin;

use App\Warga;
use App\Perkebunan;
use PDF;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PDFController extends Controller
{
    public function warga()
    {
    	$warga = Warga::all();

    	$pdf = PDF::loadview('PDF.warga',['warga'=>$warga])->setPaper('a4', 'landscape');
    	return $pdf->stream();
    }

    public function perkebunan()
    {
    	$perkebunan = Perkebunan::all();

    	$pdf = PDF::loadview('PDF.perkebunan',['perkebunan'=>$perkebunan])->setPaper('a4', 'landscape');
    	return $pdf->stream();
    }
}
