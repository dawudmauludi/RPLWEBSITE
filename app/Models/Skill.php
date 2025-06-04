<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    protected $fillable = ['jobsheet_id', 'name'];

    public function jobsheet(){
        return $this->belongsTo(Jobs::class);
    }
}
