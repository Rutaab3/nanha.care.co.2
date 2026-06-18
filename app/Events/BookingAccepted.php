<?php

namespace App\Events;

use App\Models\Babysitting\Booking;
use Illuminate\Foundation\Events\Dispatchable;

class BookingAccepted
{
    use Dispatchable;

    public Booking $booking;

    public function __construct(Booking $booking)
    {
        $this->booking = $booking;
    }
}
