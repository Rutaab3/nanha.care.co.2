<?php

namespace App\DTOs\Notifications;

use App\Models\System\Notification;

readonly class NotificationDto
{
    public function __construct(
        public string $user_id,
        public string $type,
        public string $message,
        public ?string $link = null,
    ) {}

    public static function fromModel(Notification $notification): self
    {
        return new self(
            user_id: (string) $notification->user_id,
            type: $notification->type,
            message: $notification->message,
            link: $notification->link,
        );
    }
}
