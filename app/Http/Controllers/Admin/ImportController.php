<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Warga;

use Session;

use App\Imports\WargaImport;
use Maatwebsite\Excel\Facades\Excel;

class ImportController extends Controller
{
    public function warga(Request $request)
	{
		// validasi
		$this->validate($request, [
			'file' => 'required|mimes:csv,xls,xlsx'
		]);

		// menangkap file excel
		$file = $request->file('file');

		// membuat nama file unik
		$nama_file = rand().$file->getClientOriginalName();

		// upload ke folder file_warga di dalam folder public
		$file->move('file_warga',$nama_file);

		// import data
		Excel::import(new WargaImport, public_path('/file_warga/'.$nama_file));

		// notifikasi dengan session
		Session::flash('sukses','Data Warga Berhasil Diimport!');

		// alihkan halaman kembali
		return redirect()->route('admin.warga.index');
	}
}
