<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Book extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'package_id',
        'adult',
        'name',
        'email',
        'mobile',
        'street',
        'city',
        'country',
        'status',
        'amount'
    ];

    protected $dates = [
        'deleted_at',
        'created_at',
        'updated_at'
    ];

    public function package(){
        return $this->belongsTo(Package::class);
        // return $this->morphOne(Package::class)->latestOfMany();
    }

}
