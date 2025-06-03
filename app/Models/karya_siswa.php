<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class karya_siswa extends Model
{
    protected $fillable = [
        'user_id', 'category_karya_id', 'judul', 'deskripsi', 'link', 'gambar_karya','is_publised'
    ];

    public function dokumentasi()
{
    return $this->hasMany(dokumentasi_karya::class);
}


    public function user()
    {
        return $this->belongsTo(User::class);
    }



public function category()
    {
        return $this->belongsTo(category_karya::class, 'category_karya_id');
    }

    public function tools()
    {
        return $this->hasMany(tools::class);
    }

    public function fiturKarya(){
        return $this->hasMany(fiturKarya::class);
    }

}
