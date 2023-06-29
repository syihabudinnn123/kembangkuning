<?php

namespace App;
use App\Pengumuman;
use App\User;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $guarded = [];

    public function pengumuman(){
        return $this->belongsTo(Pengumuman::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

}
