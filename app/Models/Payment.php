<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable  = [
        'mentee_id',
        'session_id',
        'provider',
        'payment_reference',
        'amount',
        'status',
    ];
}
