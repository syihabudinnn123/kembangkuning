<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Pengumuman;

class PengumumanController extends Controller
{
    public function all()
    {
        return Pengumuman::all();
    }

    public function show($id)
    {
        return Pengumuman::findOrFail($id);
    }

    public function store(Request $request)
    {
        $pengumuman = Pengumuman::create($request->all());
        return response()->json('Pengumuman Berhasil Ditambah');
    }

    public function update(Request $request, $id)
    {
        $pengumuman = Pengumuman::findOrFail($id);
        $pengumuman->update($request->all());
        return $pengumuman;
    }

    public function delete($id)
    {
        $pengumuman = Pengumuman::where('id', $id)->first();
        $pengumuman->delete();

        return response('Berhasil Menghapus Data');
    }
}
