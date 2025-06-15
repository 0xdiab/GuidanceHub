<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $faillable =[
        'mentor_id',
        'mentee_id',
        'session_time',
        'session_link',
        'status',
        'is_paid',
        'payment_id',
        'meeting_provider',
        'meeting_id'
    ];
}
