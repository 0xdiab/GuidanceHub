<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    protected $fillable = ['name'];
    

    public function mentors()
    {
        return $this->belongsToMany(User::class, 'skill_user', 'skill_id', 'mentor_id')->withTimestamps();
    }
}
