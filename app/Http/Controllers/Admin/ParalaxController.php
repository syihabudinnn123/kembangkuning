<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Paralax;
use Illuminate\Support\Facades\Storage;

class ParalaxController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $paralax = Paralax::latest()->get();
        $title = "Data Cover Paralax";
        return view('admin.paralax.index',compact('paralax','title'))
        ->with('i', (request()->input('page', 1) - 1) * 5);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.paralax.create',[
            'title' => "Tambah Paralax Cover",
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
            'cover'=> 'file|image'
        ]);

        $gambar= null;
        if ($request->hasFile('cover')){
            $gambar = $request->file('cover')->store('paralax/cover');
        }

        Paralax::create([

            'cover'=> $gambar

        ]);

        return redirect()->route('admin.paralax.index')->withSuccess('Data Paralax Berhasil Ditambahkan');
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
    public function edit(Paralax $paralax)
    {
        return view('admin.paralax.edit', [
            'title' => 'Ubah data Paralax',
            'paralax' => $paralax,

        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Paralax $paralax)
    {
        $this->validate($request, [

            'cover'=> 'file|image',

        ]);

        $cover= $paralax->cover;
        if ($request->hasFile('cover')){
            Storage::delete($paralax->cover);
            $cover = $request->file('cover')->store('paralax/cover');
        }

        $paralax->update([

            'cover'=> $cover,

        ]);


        return redirect()->route('admin.paralax.index')->withSuccess('Data Pengumuman Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Paralax $paralax)
    {
        $paralax->delete();

        return redirect()->route('admin.paralax.index')->withDanger('Data Pengumuman Sudah Dihapus');
    }
}
