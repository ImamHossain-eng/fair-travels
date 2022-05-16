<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Exchange_Book extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'exchange_id', 
        'type', 
        'amount', 
        'bdt_amount', 
        'mobile', 
        'email'
    ];

    protected $dates = [
        'deleted_at',
        'created_at',
        'updated_at'
    ];


    public function exchange(){
        return $this->belongsTo(Exchange::class);
    }

}
