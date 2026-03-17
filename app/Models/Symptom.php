<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Symptom extends Model
{
    protected $fillable = [
        'name',
        'description',
        'notes',
        'severity',
        'date_recorded',
        'user_id'
    ];

    public $timestamps = false;
}
