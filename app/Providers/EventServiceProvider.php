<?php

namespace App\Providers;

use App\Events\AnnouncementPublished;
use App\Events\BlogPostSubmitted;
use App\Events\BookingAccepted;
use App\Events\BookingCompleted;
use App\Events\BookingCreated;
use App\Events\OrderPlaced;
use App\Events\ProductSubmitted;
use App\Events\TicketCreated;
use App\Listeners\SendAnnouncementNotification;
use App\Listeners\SendBookingNotification;
use App\Listeners\SendModerationNotification;
use App\Listeners\SendOrderNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    protected $listen = [
        BookingCreated::class => [
            SendBookingNotification::class,
        ],
        BookingAccepted::class => [
            SendBookingNotification::class,
        ],
        BookingCompleted::class => [],
        OrderPlaced::class => [
            SendOrderNotification::class,
        ],
        ProductSubmitted::class => [
            SendModerationNotification::class,
        ],
        BlogPostSubmitted::class => [
            SendModerationNotification::class,
        ],
        TicketCreated::class => [],
        AnnouncementPublished::class => [
            SendAnnouncementNotification::class,
        ],
    ];

    public function boot(): void
    {
        //
    }

    public function shouldDiscoverEvents(): bool
    {
        return false;
    }
}
