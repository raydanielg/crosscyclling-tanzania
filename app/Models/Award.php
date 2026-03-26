<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Award extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'event_name',
        'position',
        'awarded_on',
        'notes',
    ];

    protected $casts = [
        'awarded_on' => 'date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
