<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    protected $fillable = [
        'name',
        'speciality',
        'city',
        'years_of_experience',
        'consultation_price',
        'available_days'
    ];

    protected $casts = [
        'available_days' => 'array'
    ];
}
