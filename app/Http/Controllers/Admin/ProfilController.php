<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Profil;
use Illuminate\Http\Request;

class ProfilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {
        $profil = Profil::latest()->get();
        return view('admin.profil.index',compact('profil'))

            ->with('i', (request()->input('page', 1) - 1) * 5);
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.profil.create',[
            'title' =>'Tambah ']);
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
            'alamat' => 'required|min:5',
            'telp' => 'required|numeric|min:5',
            'email' => 'required|email',
            'sejarah' => 'required',
            'fungsi' => 'required',
            'tentang' => 'required',
        ]);


        $profil = Profil::create([
         'alamat' => $request->alamat,
         'telp' => $request->telp,
         'email' => $request->email,
         'nama'=> $request->nama,
         'sejarah'=> $request->sejarah,
         'tentang'=> $request->tentang,
         'fungsi'=> $request->fungsi,
         'lokasi' => $request->lokasi,
        ]);

         if($profil) {
            session()->flash('success', 'Data saved successfully');
        } else {
            session()->flash('error', 'Data failed to save');
        }

         return redirect()->route('admin.profil.index');
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
    public function edit(Profil $profil)
    {
        return view('admin.profil.edit', [
            'title' =>'Edit Profil',
            'profil' => $profil,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Profil $profil)
    {
        $this->validate($request, [
            'nama' => 'required',
            'alamat' => 'required|min:5',
            'telp' => 'required|numeric|min:5',
            'email' => 'required|email',
            'sejarah' => 'required',
            'fungsi' => 'required',
            'tentang' => 'required',
        ]);

        $profil->update([
            'alamat' => $request->alamat,
            'telp' => $request->telp,
            'email' => $request->email,
            'nama'=> $request->nama,
            'sejarah'=> $request->sejarah,
            'tentang'=> $request->tentang,
            'fungsi'=> $request->fungsi,
            'lokasi' => $request->lokasi,
        ]);

        if($profil) {
            session()->flash('success', 'Data saved successfully');
        } else {
            session()->flash('error', 'Data failed to save');
        }

         return redirect()->route('admin.profil.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Profil $profil)
    {
        $profil->delete();
        return redirect()->route('admin.profil.index')
        ->with('danger', 'Data Profil Desa Berhasil dihapus');
    }
}
