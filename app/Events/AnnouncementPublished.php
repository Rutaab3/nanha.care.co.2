<?php

namespace App\Events;

use App\Models\System\Announcement;
use Illuminate\Foundation\Events\Dispatchable;

class AnnouncementPublished
{
    use Dispatchable;

    public Announcement $announcement;

    public function __construct(Announcement $announcement)
    {
        $this->announcement = $announcement;
    }
}
