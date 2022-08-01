<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Hotel extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'destination',
        'hotel_type',
        'room_type',
        'price_per_room',
        'no_of_room',
        'check_in',
        'check_out',
        'amount',
        'user_name',
        'email',
        'mobile',
        'payment'
    ];

    protected $dates = [
        'deleted_at',
        'created_at',
        'updated_at',
    ];

}
