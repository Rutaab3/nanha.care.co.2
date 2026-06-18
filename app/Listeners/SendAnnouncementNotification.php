<?php

namespace App\Listeners;

use App\Contracts\INotificationService;
use App\Events\AnnouncementPublished;

class SendAnnouncementNotification
{
    public function __construct(private INotificationService $notificationService) {}

    public function handle(AnnouncementPublished $event): void
    {
        $announcement = $event->announcement;
        $this->notificationService->broadcast(
            $announcement->target_roles,
            $announcement->body
        );
    }
}
