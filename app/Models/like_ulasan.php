<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class like_ulasan extends Model
{
    protected $fillable =['ulasan_alumni_id'];

    public function ulasan_alumni(){
        return $this->belongsTo(ulasan_alumni::class);
    }
}
