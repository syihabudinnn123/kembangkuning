<?php

namespace App;
use App\Warga;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Perkebunan extends Model
{
    
    use SoftDeletes;
    protected $table = 'perkebunan';
    public $timestamps = false;
    protected $fillable = ['warga_id','jenis_perkebunan','deskripsi','luas_lahan', 'waktu_tanam', 'waktu_panen'];

    public function warga()
    {
        return $this->belongsTo(Warga::class);
    }

}
