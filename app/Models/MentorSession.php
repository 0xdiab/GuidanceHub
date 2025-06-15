<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MentorSession extends Model
{
    protected $fillable = [
        'mentee_id',
        'session_id',
        'provider',
        'payment_reference',
        'amount',
        'status',
    ];

    public function mentor()
    {
        return $this->belongsTo(User::class, 'mentor_id');
    }

    public function mentee()
    {
        return $this->belongsTo(User::class, 'mentee_id');
    }

    public function review()
    {
        return $this->hasOne(Review::class, 'session_id');
    }

    public function payment()
    {
        return $this->hasOne(Payment::class, 'session_id');
    }
}
