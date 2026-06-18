<?php

namespace App\Models\Babysitting;

use App\Enums\BookingStatus;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = [
        'parent_id',
        'babysitter_id',
        'date',
        'start_time',
        'duration_hours',
        'location',
        'notes',
        'total_fee',
        'status',
        'decline_reason',
    ];

    protected $casts = [
        'status' => BookingStatus::class,
        'date' => 'date',
    ];

    public function parent()
    {
        return $this->belongsTo(User::class, 'parent_id');
    }

    public function babysitter()
    {
        return $this->belongsTo(User::class, 'babysitter_id');
    }

    public function bookingChildren()
    {
        return $this->hasMany(BookingChild::class, 'booking_id');
    }
}
