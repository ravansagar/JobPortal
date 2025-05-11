<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Job extends Model
{
    use HasFactory;
    protected $table = "joblist";
    protected $fillable = ['name', 'image', 'currency', 'salary', 'description','user_id','tag_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function tag()
    {
        return $this->belongsTo(Tag::class);
    }
}
