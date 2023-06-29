<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Warga;
use App\Perkebunan;

class PerkebunanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.perkebunan.index',[
            'title' => "Data Perkebunan",
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.perkebunan.create',[
            'title' =>'Tambah Perkebunan',
            'wargas' => Warga::orderBy('nama', 'ASC')->get(),
            ]);
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
        return redirect()->route('admin.perkebunan.index')->withSuccess('Data Perkebunan Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Perkebunan $perkebunan)
    {
        return view('admin.perkebunan.edit', [
            'title' => 'Ubah data Perkebunan',
            'perkebunan' => $perkebunan,
            'wargas'=> Warga::orderBy('nama','ASC')->get(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Perkebunan $perkebunan)
    {
        $this->validate($request, [
            'warga_id' => 'required',
            'jenis_perkebunan' => 'required',
            'deskripsi' => 'required',
            'luas_lahan'=> 'required',
            'waktu_tanam' => 'required|date',
            'waktu_panen' => 'required|date',
        ]);

        $perkebunan->update([
            'warga_id' => $request->warga_id,
            'jenis_perkebunan' => $request->jenis_perkebunan,
            'deskripsi' => $request->deskripsi,
            'luas_lahan'=> $request->luas_lahan,
            'waktu_tanam'=> $request->waktu_tanam,
            'waktu_panen'=> $request->waktu_panen,
        ]);
        return redirect()->route('admin.perkebunan.index')->withSuccess('Data Perkebunan Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Perkebunan $perkebunan)
    {
        $perkebunan->delete();

        return redirect()->route('admin.perkebunan.index')->withDanger('Data Perkebunan Sudah Dihapus');
    }

    public function tampil_hapus()
    {
        $perkebunan = Perkebunan::onlyTrashed()->get();
    	return view('admin.perkebunan.restore', ['perkebunan' => $perkebunan]);
    }

    public function kembalikan($id)
    {
    	$perkebunan = Perkebunan::onlyTrashed()->where('id', $id);
    	$perkebunan->restore();
    	return redirect()->route('admin.perkebunan.restore')->with(['success' => 'Data Perkebunan Berhasil Dikembalikan ']);
    }

    public function hapus_permanen($id)
    {
    	// hapus permanen data warga
    	$perkebunan = Perkebunan::onlyTrashed()->where('id',$id);
    	$perkebunan->forceDelete();
 
    	return redirect()->route('admin.perkebunan.restore')->with(['error' => 'Data Perkebunan Berhasil Dihapus ']);
    }

    public function kembalikan_semua()
    {
    		
    	$perkebunan = Perkebunan::onlyTrashed();
    	$perkebunan->restore();
 
    	return redirect()->route('admin.perkebunan.restore')->with(['success' => 'Data Perkebunan Berhasil Dikembalikan ']);
    }
}
