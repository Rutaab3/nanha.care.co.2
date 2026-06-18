<?php

namespace App\Enums;

enum TicketStatus: string
{
    case New = 'new';
    case Open = 'open';
    case InProgress = 'in_progress';
    case Resolved = 'resolved';
    case Closed = 'closed';
    case Escalated = 'escalated';

    public function label(): string
    {
        return match ($this) {
            self::New => 'New',
            self::Open => 'Open',
            self::InProgress => 'In Progress',
            self::Resolved => 'Resolved',
            self::Closed => 'Closed',
            self::Escalated => 'Escalated',
        };
    }
}
