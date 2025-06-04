<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class alumni_profile extends Model
{
    protected $fillable = [
        'user_id', 'nama', 'nisn','tahun_lulus', 'jenkel', 'telepon', 'alamat',
        'tempat_lahir', 'tanggal_lahir', 'agama', 'foto','latitude', 'longitude'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
