<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ulasan_alumni extends Model
{
    protected $fillable = [
        'user_id',
        'ulasan',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function like(){
        return $this->hasMany(like_ulasan::class);
    }
}
