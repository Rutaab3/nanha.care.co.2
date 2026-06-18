<?php

namespace App\Providers;

use App\Contracts\IBabysitterService;
use App\Contracts\IBlogService;
use App\Contracts\IBookingService;
use App\Contracts\IDashboardService;
use App\Contracts\IEmailService;
use App\Contracts\IFileUploadService;
use App\Contracts\IMarketplaceService;
use App\Contracts\IModerationService;
use App\Contracts\INotificationService;
use App\Contracts\IOnboardingService;
use App\Contracts\IOrderService;
use App\Contracts\IPaymentService;
use App\Contracts\IProductService;
use App\Contracts\ISubscriptionService;
use App\Contracts\ISupportTicketService;
use App\Services\BabysitterService;
use App\Services\BlogService;
use App\Services\BookingService;
use App\Services\DashboardService;
use App\Services\EmailService;
use App\Services\FileUploadService;
use App\Services\MarketplaceService;
use App\Services\ModerationService;
use App\Services\NotificationService;
use App\Services\OnboardingService;
use App\Services\OrderService;
use App\Services\PaymentService;
use App\Services\ProductService;
use App\Services\SubscriptionService;
use App\Services\SupportTicketService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(IBabysitterService::class, BabysitterService::class);
        $this->app->bind(IBookingService::class, BookingService::class);
        $this->app->bind(IMarketplaceService::class, MarketplaceService::class);
        $this->app->bind(IProductService::class, ProductService::class);
        $this->app->bind(IOrderService::class, OrderService::class);
        $this->app->bind(IBlogService::class, BlogService::class);
        $this->app->bind(INotificationService::class, NotificationService::class);
        $this->app->bind(IEmailService::class, EmailService::class);
        $this->app->bind(IFileUploadService::class, FileUploadService::class);
        $this->app->bind(ISupportTicketService::class, SupportTicketService::class);
        $this->app->bind(IModerationService::class, ModerationService::class);
        $this->app->bind(IDashboardService::class, DashboardService::class);
        $this->app->bind(IPaymentService::class, PaymentService::class);
        $this->app->bind(ISubscriptionService::class, SubscriptionService::class);
        $this->app->bind(IOnboardingService::class, OnboardingService::class);
    }

    public function boot(): void
    {
        //
    }
}
