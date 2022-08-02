<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Insurance extends Model
{
    use HasFactory;

    protected $fillable = [
        'region',
        'starting_date',
        'ending_date',
        'user_name',
        'email',
        'mobile',
        'payment',
        'amount'
    ];

    protected $dates = [
        'starting_date',
        'ending_date',
        'starting_date',
        'created_at',
        'updated_at'
    ];
    
}
