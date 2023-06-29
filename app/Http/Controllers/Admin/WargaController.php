<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Warga;


class WargaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.warga.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jenis_kelamin = ['Laki-laki','perempuan'];
        $agama = ['Islam','Kristen Protestan', 'Kristen Katolik', 'Hindu', 'Budha', 'Konghucu'];
        return view('admin.warga.create',[
            'title' =>'Tambah Warga']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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
        return redirect()->route('admin.warga.index')->withSuccess('Data warga Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Warga $warga)
    {
        return view('admin.warga.lihat', [
            'title' =>'Informasi Full Warga',
            'warga' => $warga,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Warga $warga)
    {
        return view('admin.warga.edit', [
            'title' =>'Edit Warga',
            'warga' => $warga,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Warga $warga)
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

        $warga->update([
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
        return redirect()->route('admin.warga.index')->withSuccess('Data Warga Berhasil Diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Warga $warga)
    {
        $warga->delete();

        return redirect()->route('admin.warga.index')
            ->with('danger', 'Data Warga Berhasil dihapus (silahkan cek Trash Warga)');
    }

    public function tampil_hapus()
    {
        $warga = Warga::onlyTrashed()->get();
    	return view('admin.warga.restore', ['warga' => $warga]);
    }

    public function kembalikan($id)
    {
    	$warga = Warga::onlyTrashed()->where('id', $id);
    	$warga->restore();
    	return redirect()->route('admin.warga.restore')->with(['success' => 'Data Berhasil Dikembalikan ']);
    }

    public function hapus_permanen($id)
    {
    	// hapus permanen data warga
    	$warga = Warga::onlyTrashed()->where('id',$id);
    	$warga->forceDelete();

    	return redirect()->route('admin.warga.restore')->with(['error' => 'Data Berhasil Dihapus ']);
    }

    public function kembalikan_semua()
    {

    	$warga = Warga::onlyTrashed();
    	$warga->restore();

    	return redirect()->route('admin.warga.restore')->with(['success' => 'Data Berhasil Dihapus ']);
    }
}
