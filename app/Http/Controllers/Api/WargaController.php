<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Warga;

class WargaController extends Controller
{
    public function all()
    {
        return Warga::all();
    }

    public function show($id)
    {
        return Warga::findOrFail($id);
    }

    public function store(Request $request)
    {
        $warga = Warga::create($request->all());
        return response()->json('Warga Berhasil Ditambah');
    }

    public function update(Request $request, $id)
    {
        $warga = Warga::findOrFail($id);
        $warga->update($request->all());
        return $warga;
    }

    public function delete($id)
    {
        $warga = Warga::where('id', $id)->first();
        $warga->delete();

        return response('Berhasil Menghapus Data');
    }
}
