<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class guru_profile extends Model
{
    protected $fillable = [
    'user_id', 'nama', 'nip', 'jenkel', 'telepon', 'alamat',
    'tempat_lahir', 'tanggal_lahir', 'agama', 'foto', 'mapel'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
