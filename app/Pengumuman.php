<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Comment;

class Pengumuman extends Model
{
    protected $table = 'pengumuman';
    protected $guarded = [];

    public function getGambar()
    {
        if  (substr($this->gambar,0,5) == "https")
        {
            return $this->gambar;
        }

        if ($this->gambar)
        {
            return asset($this->gambar);
        }

        return 'https://via.placeholder.com/150x200.png?text=No+Cover';
    }

    public function comment(){
        return $this->hasMany(Comment::class);
    }
}
