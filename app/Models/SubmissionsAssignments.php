<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubmissionsAssignments extends Model
{
    protected $fillable = [
        'assignment_id',
        'user_id',
        'link',
        'file',
    ];

    public function assignment()
    {
        return $this->belongsTo(Assignments::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function photos()
{
    return $this->hasMany(Submission_Photos::class, 'submission_id'); 
}

}
