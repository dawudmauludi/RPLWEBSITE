<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Assignment_Photos extends Model
{
    protected $table = 'assignment_photos';
    protected $fillable = ['photo_path', 'assignment_id'];

    public function assignment()
    {
        return $this->belongsTo(Assignments::class, 'assignment_id');
    }
}
