<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class siswa_profile extends Model
{
    protected $fillable = [
        'user_id', 'kelas_id', 'nama', 'nisn', 'jenkel', 'telepon', 'alamat',
        'tempat_lahir', 'tanggal_lahir', 'agama', 'foto'
    ];

     public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }

}
