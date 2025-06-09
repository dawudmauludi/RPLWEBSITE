<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Assignments extends Model
{
    protected $fillable =['title', 'instructions', 'due_date','link', 'file', 'kelas_id'];

    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'kelas_id', 'id');
    }

    public function photos()
    {
        return $this->hasMany(Assignment_Photos::class, 'assignment_id');
    }

    public function submissions() {
        return $this->hasMany(SubmissionsAssignments::class, 'assignment_id');
    }

}
