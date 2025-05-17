<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ActivityBooking extends Model
{
    protected $fillable = [
        'user_id',
        'activity_id',
        'name',
        'email',
        'phone',
        'booking_date',
        'booking_time',
        'number_of_people',
        'status',
        'special_requests',
        'total_price'
    ];

    protected $casts = [
        'booking_date' => 'date',
        'booking_time' => 'datetime',
        'total_price' => 'decimal:2',
        'number_of_people' => 'integer'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function activity(): BelongsTo
    {
        return $this->belongsTo(Activity::class);
    }
} 