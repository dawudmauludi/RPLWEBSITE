<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Submission_Photos extends Model
{
     protected $fillable = ['photo_path', 'submission_assignment_id'];

    public function submission()
    {
        return $this->belongsTo(SubmissionsAssignments::class, 'submission_assignment_id');
    }
}
