<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class fiturKarya extends Model
{
     protected $fillable = ['karya_siswa_id', 'penjelasan'];


    public function karya()
    {
    return $this->belongsTo(karya_siswa::class, 'karya_siswa_id');
    }
}
