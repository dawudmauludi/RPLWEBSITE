<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Development extends Model
{
   protected $fillable = ['name', 'slug', 'icon', 'image'];

     public function listDevelopment(){
        return $this->hasMany(ListDevelopment::class);
    }
}
