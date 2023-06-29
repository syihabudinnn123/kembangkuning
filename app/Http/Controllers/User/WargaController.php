<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Warga;
use App\Perkebunan;

class WargaController extends Controller
{
    public function create()
    {
        $jenis_kelamin = ['Laki-laki','perempuan'];
        $agama = ['Islam','Kristen Protestan', 'Kristen Katolik', 'Hindu', 'Budha', 'Konghucu'];
        return view('user.warga.create',[
            'title' =>'Tambah Warga']);
    }

    public function store(Request $request)
    {

        $this->validate($request, [
            'NIK' => 'required|numeric|digits:16',
            'nama' => 'required|min:5',
            'tempat_lahir' => 'required',
            'tanggal_lahir'=> 'required|date',
            'alamat' => 'required',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'agama' => 'required',
            'telp' => 'required|numeric|digits_between:11,12',
            'pekerjaan' => 'required',
        ]);

        Warga::create([
            'NIK' => $request->NIK,
            'nama' => $request->nama,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir'=> $request->tanggal_lahir,
            'alamat'=> $request->alamat,
            'telp'=> $request->telp,
            'jenis_kelamin'=> $request->jenis_kelamin,
            'agama'=> $request->agama,
            'pekerjaan'=> $request->pekerjaan,
        ]);
        return redirect()->route('user.dashboard')->withSuccess('Informasi Telah Ditambahkan');
    }

    public function buat()
    {
        return view('user.warga.perkebunan',[
            'title' =>'Form Perkebunan',
            'wargas' => Warga::orderBy('nama', 'ASC')->get(),
            ]);
    }

    public function simpan(Request $request)
    {
        $this->validate($request, [
            'warga_id' => 'required',
            'jenis_perkebunan' => 'required',
            'deskripsi' => 'required',
            'luas_lahan'=> 'required',
            'waktu_tanam' => 'required|date',
            'waktu_panen' => 'required|date',
        ]);

        Perkebunan::create([
            'warga_id' => $request->warga_id,
            'jenis_perkebunan' => $request->jenis_perkebunan,
            'deskripsi' => $request->deskripsi,
            'luas_lahan'=> $request->luas_lahan,
            'waktu_tanam'=> $request->waktu_tanam,
            'waktu_panen'=> $request->waktu_panen,
        ]);
        return redirect()->route('user.dashboard')->withSuccess('Data Perkebunan Berhasil Ditambahkan');
    }

}
