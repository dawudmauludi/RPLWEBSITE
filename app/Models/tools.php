<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class tools extends Model
{
    protected $fillable = ['karya_siswa_id', 'nama'];


    public function karya()
{
    return $this->belongsTo(karya_siswa::class, 'karya_siswa_id');
}

}
