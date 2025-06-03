<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    protected $fillable = ['name', 'slug', 'icon', 'description', 'image'];
}
