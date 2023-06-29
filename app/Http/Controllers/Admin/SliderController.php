<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $slider = Slider::latest()->get();
        $title = "Data Cover Paralax";
        return view('admin.slider.index',compact('slider','title'))
        ->with('i', (request()->input('page', 1) - 1) * 5);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.slider.create',[
            'title' => "Tambah Slider Cover",
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
            $gambar = $request->file('cover')->store('slider/cover');
        }

        Slider::create([

            'cover'=> $gambar

        ]);

        return redirect()->route('admin.slider.index')->withSuccess('Data slider Berhasil Ditambahkan');
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
    public function edit(Slider $slider)
    {
        return view('admin.slider.edit', [
            'title' => 'Ubah data slider',
            'slider' => $slider,

        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Slider $slider)
    {
        $this->validate($request, [

            'cover'=> 'file|image',

        ]);

        $cover= $slider->cover;
        if ($request->hasFile('cover')){
            Storage::delete($slider->cover);
            $cover = $request->file('cover')->store('slider/cover');
        }

        $slider->update([

            'cover'=> $cover,

        ]);

        return redirect()->route('admin.slider.index')->withSuccess('Data Slider Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Slider $slider)
    {
        $slider->delete();
        return redirect()->back()->withDanger('Data Pengumuman Sudah Dihapus');
    }
}
