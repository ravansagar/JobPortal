<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ApplyJob extends Model
{
    protected $table = "application";
    protected $fillable = ['name', 'email', 'resume', 'cover_letter', 'job_id', 'user_id'];

    public function job()
    {
        return $this->belongsTo(Job::class);
    }
}
