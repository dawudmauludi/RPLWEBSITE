<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Future extends Model
{
    protected $fillable = [
        'name',
        'description',
        'icon',
    ];
}
