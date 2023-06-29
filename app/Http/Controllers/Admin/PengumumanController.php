<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Pengumuman;
use Illuminate\Support\Facades\Storage;

class PengumumanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.pengumuman.index',[
            'title' => "Data Pengumuman",
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pengumuman.create',[
            'title' => "Tambah Pengumuman",
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
            'nama' => 'required',
            'deskripsi' => 'required|min:20',
            'tanggal' => 'required|date',
            'gambar'=> 'file|image'
        ]);

        $gambar= null;
        if ($request->hasFile('gambar')){
            $gambar = $request->file('gambar')->store('assets/gambar');
        }

        Pengumuman::create([
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'tanggal' => $request->tanggal,
            'gambar'=> $gambar
            
        ]);

        return redirect()->route('admin.pengumuman.index')->withSuccess('Data Pengumuman Berhasil Ditambahkan');
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
    public function edit(Pengumuman $pengumuman)
    {
        return view('admin.pengumuman.edit', [
            'title' => 'Ubah data Pengumuman',
            'pengumuman' => $pengumuman,
            
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pengumuman $pengumuman)
    {
        $this->validate($request, [
            'nama' => 'required',
            'deskripsi' => 'required|min:20',
            'tanggal' => 'required|date',
            'gambar'=> 'file|image'
        ]);

        $gambar= null;
        if ($request->hasFile('gambar')){
            $gambar = $request->file('gambar')->store('assets/gambar');
        }

        Pengumuman::update([
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'tanggal' => $request->tanggal,
            'gambar'=> $gambar
            
        ]);

        return redirect()->route('admin.pengumuman.index')->withSuccess('Data Pengumuman Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pengumuman $pengumuman)
    {
        $pengumuman->delete();

        return redirect()->route('admin.pengumuman.index')->withDanger('Data Pengumuman Sudah Dihapus');
    }
}
