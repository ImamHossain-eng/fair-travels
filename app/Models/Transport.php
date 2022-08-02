<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transport extends Model
{
    use HasFactory;

    protected $fillable = [
        'location',
        'type',
        'price_per_day',
        'booking_date',
        'no_of_days',
        'user_name',
        'email',
        'mobile',
        'payment',
        'amount'
    ];

    protected $dates = [
        'booking_date',
        'created_at',
        'updated_at'
    ];
}
