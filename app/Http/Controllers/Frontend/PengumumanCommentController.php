<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Comment;
use App\Pengumuman;
use Carbon\Carbon;

class PengumumanCommentController extends Controller
{
    public function store(Request $request, Pengumuman $pengumuman)
    {
        $this->validate($request, [
            'message'=> 'required',
        ]);
       Comment::create([
           'pengumuman_id' => $pengumuman->id,
           'user_id' => auth()->id(),
           'message' => $request->message,
       ]);

       return redirect()->back()->with('success_message', 'Komentar Berhasil Dikirim.');
    }

}
