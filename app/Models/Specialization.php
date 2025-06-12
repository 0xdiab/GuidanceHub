<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Specialization extends Model
{
    protected $fillable = ['name'];

    public function mentors()
    {
        return $this->belongsToMany(User::class, 'specialization_user', 'specialization_id', 'mentor_id')->withTimestamps();
    }
}
