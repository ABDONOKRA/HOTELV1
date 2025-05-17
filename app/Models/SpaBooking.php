<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SpaBooking extends Model
{
    protected $fillable = [
        'user_id',
        'spa_service_id',
        'name',
        'email',
        'phone',
        'booking_date',
        'booking_time',
        'status',
        'special_requests',
        'price'
    ];

    protected $casts = [
        'booking_date' => 'date',
        'booking_time' => 'datetime',
        'price' => 'decimal:2'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function spaService(): BelongsTo
    {
        return $this->belongsTo(Activity::class, 'spa_service_id');
    }
} 