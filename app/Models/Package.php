<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Package extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'tour_code',
        'date',
        'amount',
        'country',
        'city',
        'description'
    ];

    protected $dates = [
        'deleted_at',
        'created_at',
        'updated_at'        
    ];

    public function books(){
        // return $this->morphMany(Book::class);
        return $this->hasMany(Book::class);
    }

}
