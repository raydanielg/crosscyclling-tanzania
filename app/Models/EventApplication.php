<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventApplication extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'event_id',
        'applicant_type',
        'applicant_name',
        'applicant_phone',
        'payment_method',
        'payment_status',
        'payment_reference',
        'status',
        'rider_number',
        'submitted_at',
    ];

    protected $casts = [
        'submitted_at' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function event()
    {
        return $this->belongsTo(Event::class);
    }
}
