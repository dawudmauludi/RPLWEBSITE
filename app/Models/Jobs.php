<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jobs extends Model
{
    protected $table = 'jobsheets';

    protected $fillable = [
        'user_id', 'nama_pekerjaan', 'nama_perusahaan', 'lokasi', 'slug', 'gaji', 'image', 'tempat_kerja', 'tipe_pekerjaan', 'waktu_pekerjaan', 'deskripsi_pekerjaan', 'link_pendaftaran'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function skill(){
        return $this->hasMany(Skill::class, 'jobsheet_id');
    }
}
