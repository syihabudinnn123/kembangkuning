<?php

namespace App\Http\Controllers\Admin;

use App\Contact;
use App\Http\Controllers\Controller;
use App\Perkebunan;
use Illuminate\Http\Request;
use App\Warga;
use App\Pengumuman;
use App\Comment;
use App\Paralax;
use App\User;

class DataController extends Controller
{
    public function wargas()
    {
        $warga = Warga::orderBy('nama', 'ASC');
        return datatables()->of($warga)
            ->addColumn('action','admin.warga.action')
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->toJson();
    }

    public function perkebunans()
    {
        $perkebunan = Perkebunan::orderBy('jenis_perkebunan', 'ASC');
        return datatables()->of($perkebunan)
            ->addColumn('warga', function(Perkebunan $model){
            return $model->warga->nama;
            })
            ->addColumn('action','admin.perkebunan.action')
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->toJson();
    }

    public function pengumumans()
    {
        $pengumuman = Pengumuman::orderBy('nama', 'ASC');
        return datatables()->of($pengumuman)
            ->editColumn('gambar', function(Pengumuman $model) {
                return '<img src="'. $model->getGambar() .'"  height="100px">';
            })
            ->addColumn('action','admin.pengumuman.action')
            ->rawColumns(['gambar','action'])
            ->addIndexColumn()
            ->toJson();
    }

    public function contacts()
    {
        $contacts = Contact::orderBy('created_at', 'ASC');
        return datatables()->of($contacts)
            ->addColumn('action','admin.kontak.action')
            ->addColumn('status', function ($contacts) {
                if ($contacts->status=="0") {
                  return '<a href="#" class="btn btn-danger btn-xs" name="status">Deactivate</a>';
                }elseif ($contacts->status=="1") {
                  return '<a href="#" class="btn btn-success btn-xs" name="status">Activate</a>';
                }
              })
            ->rawColumns(['action', 'Status'])
            ->addIndexColumn()
            ->toJson();
    }

      public function comments()
    {
        $comments = Comment::orderBy('created_at', 'ASC');
        return datatables()->of($comments)
            ->addColumn('pengumuman', function(Comment $model){
            return $model->pengumuman->nama;
            })
            ->addColumn('user', function(Comment $model){
            return $model->user->name;
            })
            ->addColumn('action','admin.komentar.action')
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->toJson();
    }

    public function paralax()
    {
        $paralax = Paralax::orderBy('created_at', 'ASC');
        return datatables()->of($paralax)
            ->editColumn('cover', function(Paralax $model) {
                return '<img src="'. $model->getGambar() .'"  height="100px">';
            })
            ->addColumn('action','admin.paralax.action')
            ->rawColumns(['cover','action'])
            ->addIndexColumn()
            ->toJson();
    }

}
