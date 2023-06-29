<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KategoriSurat extends Model
{
    protected $guarded = [];

    public function arsipSurat(){
        return $this->hasMany(ArsipSurat::class, 'kategori_id');
    }
}
