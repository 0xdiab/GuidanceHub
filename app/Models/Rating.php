<?php

namespace App\Models;

use App\Models\MentorSession;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    protected $fillable = ['mentee_id', 'mentor_id', 'session_id', 'rating', 'comment'];

    // ratings and comments
    public function user() {
        return $this->belongsTo(User::class, 'mentee_id');
    }
    
    public function session() {
        return $this->belongsTo(MentorSession::class, 'session_id');
    }
    //
}
