<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jurusan extends Model
{
    protected $fillable = ['name', 'other_name','slogan', 'isi', 'image'];
}
