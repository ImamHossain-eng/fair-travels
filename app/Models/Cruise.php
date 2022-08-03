<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cruise extends Model
{
    use HasFactory;

    protected $fillable = [
        'c_trip_id',
        'person',
        'amount',
        'user_name',
        'email',
        'mobile',
        'payment'
    ];

    protected $dates = [
        'created_at',
        'updated_at'
    ];
    public function CTrip(){
        return $this->belongsTo(CTrip::class);
    }
}
