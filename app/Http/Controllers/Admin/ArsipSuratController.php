<?php

namespace App\Http\Controllers\Admin;

use App\ArsipSurat;
use App\Http\Controllers\Controller;
use App\KategoriSurat;
use File;
use Illuminate\Http\Request;

class ArsipSuratController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $surat_masuk = ArsipSurat::where('jenis_surat', 'Surat Masuk')->get();
        return view('admin.arsip-surat.index', compact('surat_masuk'));
    }

    public function index2()
    {
        $surat_keluar = ArsipSurat::where('jenis_surat', 'Surat keluar')->get();
        return view('admin.arsip-surat.index2', compact('surat_keluar'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategori = KategoriSurat::all();
        return view('admin.arsip-surat.create', compact('kategori'));
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
            'kategori_id' => 'required',
            'judul_surat' => 'required',
            'tanggal_surat' => 'required',
            'nomor_surat' => 'required',
            'jenis_surat' => 'required',
            'file_surat' => 'required',
            'asal_tujuan' => 'required',
            
        ]);
      
        $imageName = $request->file('file_surat')->getClientOriginalName();
        $request->file_surat->move(public_path('/file_surat'), $imageName);


        ArsipSurat::create([
            'kategori_id' => $request->kategori_id,
            'judul_surat' => $request->judul_surat,
            'tanggal_surat' => $request->tanggal_surat,
            'nomor_surat' => $request->nomor_surat,
            'jenis_surat' => $request->jenis_surat,
            'file_surat' => $imageName,
            'asal_tujuan' => $request->asal_tujuan, 
        ]);

        return redirect()->back()->withSuccess('Arsip Surat Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(ArsipSurat $arsipSurat)
    {
        $kategori = KategoriSurat::all();
        return view('admin.arsip-surat.create', compact('kategori', 'arsipSurat'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(ArsipSurat $arsipSurat)
    {
        $kategori = KategoriSurat::all();
        return view('admin.arsip-surat.edit', compact('kategori', 'arsipSurat'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,ArsipSurat $arsipSurat)
    {
        $this->validate($request, [
            'kategori_id' => 'required',
            'judul_surat' => 'required',
            'tanggal_surat' => 'required',
            'nomor_surat' => 'required',
            'jenis_surat' => 'required',
            'asal_tujuan' => 'required',
            
        ]);
      
        if($request->file('file_surat')){
            File::delete('file_surat/' . $arsipSurat->file_surat);

            $imageName = $request->file('file_surat')->getClientOriginalName();
            $request->file_surat->move(public_path('/file_surat'), $imageName);
            $arsipSurat->update([
                'kategori_id' => $request->kategori_id,
                'judul_surat' => $request->judul_surat,
                'tanggal_surat' => $request->tanggal_surat,
                'nomor_surat' => $request->nomor_surat,
                'jenis_surat' => $request->jenis_surat,
                'file_surat' => $imageName,
                'asal_tujuan' => $request->asal_tujuan, 
            ]);
        }else{
            $arsipSurat->update([
                'kategori_id' => $request->kategori_id,
                'judul_surat' => $request->judul_surat,
                'tanggal_surat' => $request->tanggal_surat,
                'nomor_surat' => $request->nomor_surat,
                'jenis_surat' => $request->jenis_surat,
                'asal_tujuan' => $request->asal_tujuan, 
            ]);
        }

        return redirect()->back()->withSuccess('Arsip Surat Berhasil Ditambahkan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(ArsipSurat $arsipSurat)
    {
        File::delete('file_surat/' . $arsipSurat->file_surat);

        $arsipSurat->delete();
    }
}
