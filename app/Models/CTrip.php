<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CTrip extends Model
{
    use HasFactory;

    protected $fillable = [
        'port',
        'date',
        'price',
        'info'
    ];

    protected $dates = [
        'date',
        'created_at',
        'updated_at'
    ];

    public function cruises(){
        return $this->hasMany(Cruise::class);
    }

}
