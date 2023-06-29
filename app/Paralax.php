<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paralax extends Model
{
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
}
