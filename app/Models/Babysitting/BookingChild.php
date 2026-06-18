<?php

namespace App\Models\Babysitting;

use Illuminate\Database\Eloquent\Model;

class BookingChild extends Model
{
    protected $fillable = [
        'booking_id',
        'child_id',
    ];

    public function booking()
    {
        return $this->belongsTo(Booking::class, 'booking_id');
    }

    public function child()
    {
        return $this->belongsTo(Child::class, 'child_id');
    }
}
