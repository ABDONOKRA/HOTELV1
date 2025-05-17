<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Activity extends Model
{
    protected $fillable = [
        'name',
        'description',
        'image',
        'type',
        'price',
        'duration_in_hours',
        'difficulty',
        'elevation'
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'duration_in_hours' => 'integer'
    ];

    public function activityBookings(): HasMany
    {
        return $this->hasMany(ActivityBooking::class);
    }

    public function spaBookings(): HasMany
    {
        return $this->hasMany(SpaBooking::class, 'spa_service_id');
    }

    public function room()
    {
        return $this->belongsTo(Room::class);
    }
}
