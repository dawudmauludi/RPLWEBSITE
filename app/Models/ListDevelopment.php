<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ListDevelopment extends Model
{
    protected $fillable= ['development_id','name'];

    public function development()
    {
    return $this->belongsTo(Development::class, 'development_id');
    }
}
