<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class dokumentasi_karya extends Model
{
    protected $fillable = ['karya_siswa_id', 'gambar'];

public function karya()
{
    return $this->belongsTo(karya_siswa::class);
}

}
