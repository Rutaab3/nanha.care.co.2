<?php

namespace App\Listeners;

use App\Contracts\INotificationService;
use App\Events\OrderPlaced;

class SendOrderNotification
{
    public function __construct(private INotificationService $notificationService) {}

    public function handle(OrderPlaced $event): void
    {
        $order = $event->order;

        $this->notificationService->send(
            $order->shop->user_id,
            'new_order',
            "New order #{$order->id} received"
        );

        $this->notificationService->send(
            $order->parent_id,
            'order_confirmed',
            "Order #{$order->id} confirmed"
        );
    }
}
