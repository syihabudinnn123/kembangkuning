<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\KategoriSurat;
use Illuminate\Http\Request;

class KategoriSuratController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kategori = KategoriSurat::all();
        return view('admin.kategori.index',[
            'title' => "Data Kategori",
            'kategori' => $kategori,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.kategori.create',[
            'title' => "Tambah Data Kategori",
            
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
            'nama_kategori' => 'required',
            
        ]);

        KategoriSurat::create([
            'nama_kategori' => $request->nama_kategori,
            
        ]);
        return redirect()->route('admin.kategori-surat.index')->withSuccess('Data Kategori Berhasil Ditambahkan');
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
    public function edit(KategoriSurat $kategoriSurat)
    {
        return view('admin.kategori.edit', compact('kategoriSurat'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, KategoriSurat $kategoriSurat)
    {
        $this->validate($request, [
            'nama_kategori' => 'required',
            
        ]);

        $kategoriSurat->update([
            'nama_kategori' => $request->nama_kategori,
            
        ]);

        return redirect()->route('admin.kategori-surat.index')->withSuccess('Data Kategori Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(KategoriSurat $kategoriSurat)
    {
        $kategoriSurat->delete();

        return redirect()->back()->withSuccess('Data Kategori Berhasil Dihapus');
    }
}
