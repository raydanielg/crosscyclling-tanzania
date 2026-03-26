<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'description',
        'image_path',
        'status',
        'application_status',
        'distance_km',
        'location',
        'route',
        'slots_total',
        'slots_remaining',
        'starts_at',
    ];

    protected $casts = [
        'starts_at' => 'datetime',
        'distance_km' => 'integer',
        'slots_total' => 'integer',
        'slots_remaining' => 'integer',
    ];
}
