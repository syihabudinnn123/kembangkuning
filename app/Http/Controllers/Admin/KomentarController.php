<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Comment;

class KomentarController extends Controller
{
    public function index()
    {
        return view('admin.komentar.index');
    }

    public function destroy(Comment $comment)
    {
        $comment->delete();

        return redirect()->route('admin.komentar.show')
            ->with('danger', 'Data Komentar Pesan Berhasil dihapus');
    }
}
