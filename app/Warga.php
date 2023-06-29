<?php

namespace App;
use App\Perkebunan;
use Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Database\Eloquent\Model;

class Warga extends Model
{
    use SoftDeletes;
    protected $table = 'warga';
    protected $jenis_kelamin = ['Laki-laki', 'perempuan'];
    protected $guarded = [];
    public $timestamps = false;
    // protected $dateFormat = 'd.m.Y';

    public function perkebunan()
    {
        return $this->hasMany(Perkebunan::class);
    }

}
