<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class berita extends Model
{
   use HasFactory;

    protected $fillable = [
        'user_id',
        'category_berita_id',
        'slug',
        'judul',
        'exerpt',
        'isi',
        'gambar_berita'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(category_berita::class, 'category_berita_id');
    }
}
