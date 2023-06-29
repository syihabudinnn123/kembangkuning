<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Warga;
use App\Perkebunan;
use App\Pengumuman;
use App\Contact;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $jumlah_warga = Warga::all()->count();
        $jumlah_perkebunan = Perkebunan::all()->count();
        $jumlah_pengumuman = Pengumuman::all()->count();
        $jumlah_pesan = Contact::all()->count();
        return view ('admin.home')->with([
            'jumlah_warga' => $jumlah_warga,
            'jumlah_perkebunan' => $jumlah_perkebunan,
            'jumlah_pengumuman' => $jumlah_pengumuman,
            'jumlah_pesan' => $jumlah_pesan
        ]);
    }


}
