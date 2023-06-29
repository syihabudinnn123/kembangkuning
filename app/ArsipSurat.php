<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class ArsipSurat extends Model
{
    protected $guarded = [];

    public function kategoriSurat(){
        return $this->belongsTo(KategoriSurat::class, 'kategori_id');
    }
}
