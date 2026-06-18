<?php

namespace App\Events;

use App\Models\Support\SupportTicket;
use Illuminate\Foundation\Events\Dispatchable;

class TicketCreated
{
    use Dispatchable;

    public SupportTicket $ticket;

    public function __construct(SupportTicket $ticket)
    {
        $this->ticket = $ticket;
    }
}
