<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class Payment extends Model
{
    use HasFactory, softDeletes;

    protected $fillable = [
        'user_id',
        'mobile',
        'transaction_id',
        'amount',
        'method',
        'type'
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    
}
