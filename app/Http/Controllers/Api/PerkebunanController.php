<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Perkebunan;

class PerkebunanController extends Controller
{
    public function all()
    {
        return Perkebunan::all();
    }

    public function show($id)
    {
        return Perkebunan::findOrFail($id);
    }

    public function store(Request $request)
    {
        $kebun = Perkebunan::create($request->all());
        return response()->json('Perkebunan Berhasil Ditambah');
    }

    public function update(Request $request, $id)
    {
        $kebun = Perkebunan::findOrFail($id);
        $kebun->update($request->all());
        return $kebun;
    }

    public function delete($id)
    {
        $kebun = Perkebunan::where('id', $id)->first();
        $kebun->delete();

        return response('Berhasil Menghapus Data');
    }
}
