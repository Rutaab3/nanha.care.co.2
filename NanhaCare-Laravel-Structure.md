# NanhaCare — Laravel Project Structure
> Full file tree translated from ASP.NET Core plan (NanhaCare-ASPNET-Plan.md + additions-NanhaCare-ASPNET-Plan.md + readme.md)

---

```
nanhacare/
│
├── app/
│   │
│   ├── Models/
│   │   ├── User.php                              ← ApplicationUser (extends Authenticatable)
│   │   ├── Profiles/
│   │   │   ├── BabysitterProfile.php
│   │   │   └── DoctorProfile.php
│   │   ├── Babysitting/
│   │   │   ├── Booking.php
│   │   │   ├── BookingChild.php
│   │   │   ├── Child.php
│   │   │   ├── BabysitterReview.php
│   │   │   ├── SavedBabysitter.php
│   │   │   └── VerificationBadge.php
│   │   ├── Marketplace/
│   │   │   ├── Product.php
│   │   │   ├── ProductImage.php
│   │   │   ├── ProductReview.php
│   │   │   ├── Shop.php
│   │   │   ├── Order.php
│   │   │   ├── OrderItem.php
│   │   │   └── ReturnRequest.php
│   │   ├── Blog/
│   │   │   ├── BlogPost.php
│   │   │   ├── Comment.php
│   │   │   ├── BlogBookmark.php
│   │   │   └── PostViewLog.php
│   │   ├── Support/
│   │   │   ├── SupportTicket.php
│   │   │   ├── TicketReply.php
│   │   │   ├── Faq.php
│   │   │   └── ReplyTemplate.php
│   │   ├── Payments/
│   │   │   ├── PaymentDetail.php
│   │   │   ├── PayoutRequest.php
│   │   │   └── UserSubscription.php
│   │   └── System/
│   │       ├── Notification.php
│   │       ├── PlatformSetting.php
│   │       ├── UserReport.php
│   │       ├── FlaggedItem.php
│   │       ├── Announcement.php
│   │       ├── ModerationLog.php
│   │       ├── RoleAssignmentLog.php
│   │       ├── NotificationPreference.php
│   │       ├── AccountDeletionRequest.php
│   │       └── ModeratorCategoryAssignment.php
│   │
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── HomeController.php                ← /, /about, /pricing, /training
│   │   │   ├── AuthController.php                ← /auth/login, /auth/register, etc.
│   │   │   ├── OnboardingController.php          ← /onboarding/{role}
│   │   │   ├── BabysittersController.php         ← /babysitters, /babysitters/{id}
│   │   │   ├── MarketplaceController.php         ← /marketplace, /marketplace/product/{id}
│   │   │   ├── ShopController.php                ← /shop/{slug}
│   │   │   ├── BlogController.php                ← /blog, /blog/{slug}
│   │   │   ├── CartController.php                ← /cart, /checkout
│   │   │   ├── NotificationsController.php       ← /notifications
│   │   │   ├── ContactController.php             ← /contact
│   │   │   ├── ErrorController.php               ← /error/{code}
│   │   │   └── Dashboard/
│   │   │       ├── Admin/
│   │   │       │   ├── DashboardController.php
│   │   │       │   ├── UsersController.php
│   │   │       │   ├── RolesController.php
│   │   │       │   ├── ModerationController.php
│   │   │       │   ├── ReportsController.php
│   │   │       │   ├── SettingsController.php
│   │   │       │   ├── AnnouncementsController.php
│   │   │       │   └── RevenueController.php
│   │   │       ├── Moderator/
│   │   │       │   ├── DashboardController.php
│   │   │       │   ├── QueueController.php
│   │   │       │   ├── PublishedController.php
│   │   │       │   ├── FlaggedController.php
│   │   │       │   ├── ReportsController.php
│   │   │       │   └── ActivityController.php
│   │   │       ├── Babysitter/
│   │   │       │   ├── DashboardController.php
│   │   │       │   ├── BookingsController.php
│   │   │       │   ├── ProfileController.php
│   │   │       │   ├── EarningsController.php
│   │   │       │   ├── ReviewsController.php
│   │   │       │   └── NotificationsController.php
│   │   │       ├── Parent/
│   │   │       │   ├── DashboardController.php
│   │   │       │   ├── BookingsController.php
│   │   │       │   ├── OrdersController.php
│   │   │       │   ├── ChildrenController.php
│   │   │       │   ├── SavedBabysittersController.php
│   │   │       │   ├── BookmarksController.php
│   │   │       │   └── SettingsController.php
│   │   │       ├── ShopOwner/
│   │   │       │   ├── DashboardController.php
│   │   │       │   ├── ProductsController.php
│   │   │       │   ├── OrdersController.php
│   │   │       │   ├── EarningsController.php
│   │   │       │   ├── ProfileController.php
│   │   │       │   └── ReviewsController.php
│   │   │       ├── Doctor/
│   │   │       │   ├── DashboardController.php
│   │   │       │   ├── PostsController.php
│   │   │       │   ├── CommentsController.php
│   │   │       │   ├── AnalyticsController.php
│   │   │       │   └── ProfileController.php
│   │   │       └── Support/
│   │   │           ├── DashboardController.php
│   │   │           ├── TicketsController.php
│   │   │           ├── FaqsController.php
│   │   │           └── EscalationsController.php
│   │   │
│   │   ├── Middleware/
│   │   │   ├── MaintenanceModeMiddleware.php
│   │   │   ├── BanCheckMiddleware.php
│   │   │   └── RoleAreaGuardMiddleware.php
│   │   │
│   │   └── Requests/                             ← Laravel FormRequests = FluentValidation
│   │       ├── Auth/
│   │       │   └── RegisterRequest.php
│   │       ├── ContactFormRequest.php
│   │       ├── Products/
│   │       │   ├── CreateProductRequest.php
│   │       │   └── EditProductRequest.php
│   │       ├── Blog/
│   │       │   └── CreateBlogPostRequest.php
│   │       ├── BookingRequest.php
│   │       ├── CheckoutRequest.php
│   │       ├── Onboarding/
│   │       │   ├── BabysitterOnboardingRequest.php
│   │       │   ├── ShopOwnerOnboardingRequest.php
│   │       │   ├── DoctorOnboardingRequest.php
│   │       │   └── ParentOnboardingRequest.php
│   │       ├── Support/
│   │       │   └── TicketReplyRequest.php
│   │       └── Admin/
│   │           └── AdminActionRequest.php
│   │
│   ├── Services/
│   │   ├── BabysitterService.php
│   │   ├── BookingService.php
│   │   ├── MarketplaceService.php
│   │   ├── ProductService.php
│   │   ├── OrderService.php
│   │   ├── BlogService.php
│   │   ├── NotificationService.php
│   │   ├── EmailService.php
│   │   ├── FileUploadService.php
│   │   ├── SupportTicketService.php
│   │   ├── ModerationService.php
│   │   ├── DashboardService.php
│   │   ├── PaymentService.php
│   │   ├── SubscriptionService.php
│   │   └── OnboardingService.php
│   │
│   ├── Contracts/                                ← Interfaces (IBabysitterService etc.)
│   │   ├── IBabysitterService.php
│   │   ├── IBookingService.php
│   │   ├── IMarketplaceService.php
│   │   ├── IProductService.php
│   │   ├── IOrderService.php
│   │   ├── IBlogService.php
│   │   ├── INotificationService.php
│   │   ├── IEmailService.php
│   │   ├── IFileUploadService.php
│   │   ├── ISupportTicketService.php
│   │   ├── IModerationService.php
│   │   ├── IDashboardService.php
│   │   ├── IPaymentService.php
│   │   ├── ISubscriptionService.php
│   │   └── IOnboardingService.php
│   │
│   ├── Enums/
│   │   ├── UserStatus.php
│   │   ├── VerifiedStatus.php
│   │   ├── BookingStatus.php
│   │   ├── ContentStatus.php
│   │   ├── OrderStatus.php
│   │   ├── TicketStatus.php
│   │   ├── TicketPriority.php
│   │   ├── ProductCategory.php
│   │   ├── BlogCategory.php
│   │   └── FaqStatus.php
│   │
│   ├── DTOs/
│   │   ├── Cart/
│   │   │   ├── CartItemDto.php
│   │   │   └── CartSummaryDto.php
│   │   ├── Address/
│   │   │   └── AddressDto.php
│   │   ├── Notifications/
│   │   │   └── NotificationDto.php
│   │   └── Common/
│   │       ├── PagedResult.php
│   │       └── SelectListItemDto.php
│   │
│   ├── Helpers/
│   │   ├── SlugHelper.php
│   │   ├── FileHelper.php
│   │   ├── DateTimeHelper.php
│   │   └── CurrencyHelper.php
│   │
│   ├── Jobs/                                     ← AnnouncementSchedulerService equivalent
│   │   └── ProcessAnnouncementsJob.php
│   │
│   ├── Events/
│   │   ├── BookingCreated.php
│   │   ├── BookingAccepted.php
│   │   ├── BookingCompleted.php
│   │   ├── OrderPlaced.php
│   │   ├── ProductSubmitted.php
│   │   ├── BlogPostSubmitted.php
│   │   ├── TicketCreated.php
│   │   └── AnnouncementPublished.php
│   │
│   ├── Listeners/
│   │   ├── SendBookingNotification.php
│   │   ├── SendOrderNotification.php
│   │   ├── SendModerationNotification.php
│   │   └── SendAnnouncementNotification.php
│   │
│   ├── Console/
│   │   └── Commands/
│   │       └── ProcessAnnouncements.php          ← runs via scheduler every 5 min
│   │
│   └── Providers/
│       ├── AppServiceProvider.php                ← bind Contracts → Services here
│       ├── AuthServiceProvider.php
│       ├── EventServiceProvider.php
│       └── RouteServiceProvider.php
│
│
├── database/
│   ├── migrations/
│   │   ├── xxxx_create_users_table.php
│   │   ├── xxxx_create_babysitter_profiles_table.php
│   │   ├── xxxx_create_doctor_profiles_table.php
│   │   ├── xxxx_create_bookings_table.php
│   │   ├── xxxx_create_booking_children_table.php
│   │   ├── xxxx_create_children_table.php
│   │   ├── xxxx_create_babysitter_reviews_table.php
│   │   ├── xxxx_create_saved_babysitters_table.php
│   │   ├── xxxx_create_verification_badges_table.php
│   │   ├── xxxx_create_shops_table.php
│   │   ├── xxxx_create_products_table.php
│   │   ├── xxxx_create_product_images_table.php
│   │   ├── xxxx_create_product_reviews_table.php
│   │   ├── xxxx_create_orders_table.php
│   │   ├── xxxx_create_order_items_table.php
│   │   ├── xxxx_create_return_requests_table.php
│   │   ├── xxxx_create_blog_posts_table.php
│   │   ├── xxxx_create_comments_table.php
│   │   ├── xxxx_create_blog_bookmarks_table.php
│   │   ├── xxxx_create_post_view_logs_table.php
│   │   ├── xxxx_create_support_tickets_table.php
│   │   ├── xxxx_create_ticket_replies_table.php
│   │   ├── xxxx_create_faqs_table.php
│   │   ├── xxxx_create_reply_templates_table.php
│   │   ├── xxxx_create_payment_details_table.php
│   │   ├── xxxx_create_payout_requests_table.php
│   │   ├── xxxx_create_user_subscriptions_table.php
│   │   ├── xxxx_create_notifications_table.php
│   │   ├── xxxx_create_platform_settings_table.php
│   │   ├── xxxx_create_user_reports_table.php
│   │   ├── xxxx_create_flagged_items_table.php
│   │   ├── xxxx_create_announcements_table.php
│   │   ├── xxxx_create_moderation_logs_table.php
│   │   ├── xxxx_create_role_assignment_logs_table.php
│   │   ├── xxxx_create_notification_preferences_table.php
│   │   ├── xxxx_create_account_deletion_requests_table.php
│   │   └── xxxx_create_moderator_category_assignments_table.php
│   │
│   └── seeders/
│       ├── DatabaseSeeder.php
│       ├── RoleSeeder.php                        ← admin, parent, babysitter, shop_owner, doctor, moderator, support_agent
│       ├── AdminUserSeeder.php
│       ├── PlatformSettingsSeeder.php
│       └── FaqSeeder.php
│
│
├── resources/
│   ├── views/
│   │   ├── layouts/
│   │   │   ├── app.blade.php                     ← public layout (navbar + footer)
│   │   │   └── dashboard.blade.php               ← dashboard layout (sidebar + topbar + bell)
│   │   │
│   │   ├── partials/
│   │   │   ├── _navbar.blade.php
│   │   │   ├── _footer.blade.php
│   │   │   ├── _babysitter-card.blade.php
│   │   │   ├── _product-card.blade.php
│   │   │   ├── _toast.blade.php
│   │   │   ├── _confirm-modal.blade.php
│   │   │   ├── _pagination.blade.php
│   │   │   └── _star-rating.blade.php
│   │   │
│   │   ├── components/
│   │   │   ├── notification-bell.blade.php
│   │   │   ├── sidebar-menu.blade.php
│   │   │   └── stats-card.blade.php
│   │   │
│   │   ├── home/
│   │   │   ├── index.blade.php
│   │   │   ├── about.blade.php
│   │   │   ├── pricing.blade.php
│   │   │   └── training.blade.php
│   │   │
│   │   ├── auth/
│   │   │   ├── login.blade.php
│   │   │   ├── register.blade.php
│   │   │   ├── forgot-password.blade.php
│   │   │   ├── reset-password.blade.php
│   │   │   ├── confirm-email.blade.php
│   │   │   ├── check-email.blade.php
│   │   │   └── suspended.blade.php
│   │   │
│   │   ├── onboarding/
│   │   │   ├── babysitter.blade.php
│   │   │   ├── shop-owner.blade.php
│   │   │   ├── doctor.blade.php
│   │   │   └── parent.blade.php
│   │   │
│   │   ├── babysitters/
│   │   │   ├── index.blade.php
│   │   │   └── profile.blade.php
│   │   │
│   │   ├── marketplace/
│   │   │   ├── index.blade.php
│   │   │   └── detail.blade.php
│   │   │
│   │   ├── cart/
│   │   │   ├── index.blade.php
│   │   │   └── checkout.blade.php
│   │   │
│   │   ├── blog/
│   │   │   ├── index.blade.php
│   │   │   └── detail.blade.php
│   │   │
│   │   ├── shop/
│   │   │   └── public.blade.php                  ← /shop/{slug}
│   │   │
│   │   ├── contact/
│   │   │   └── index.blade.php
│   │   │
│   │   ├── notifications/
│   │   │   └── index.blade.php
│   │   │
│   │   ├── errors/
│   │   │   ├── 401.blade.php
│   │   │   ├── 404.blade.php
│   │   │   └── 500.blade.php
│   │   │
│   │   └── dashboard/
│   │       ├── admin/
│   │       │   ├── index.blade.php
│   │       │   ├── users/
│   │       │   │   ├── index.blade.php
│   │       │   │   ├── details.blade.php
│   │       │   │   └── edit.blade.php
│   │       │   ├── roles/
│   │       │   │   └── index.blade.php
│   │       │   ├── moderation/
│   │       │   │   └── index.blade.php
│   │       │   ├── reports/
│   │       │   │   └── index.blade.php
│   │       │   ├── settings/
│   │       │   │   └── index.blade.php
│   │       │   ├── revenue/
│   │       │   │   └── index.blade.php
│   │       │   └── announcements/
│   │       │       ├── index.blade.php
│   │       │       └── create.blade.php
│   │       ├── moderator/
│   │       │   ├── index.blade.php
│   │       │   ├── queue/
│   │       │   │   └── index.blade.php
│   │       │   ├── published/
│   │       │   │   └── index.blade.php
│   │       │   ├── flagged/
│   │       │   │   └── index.blade.php
│   │       │   ├── reports/
│   │       │   │   └── index.blade.php
│   │       │   └── activity/
│   │       │       └── index.blade.php
│   │       ├── babysitter/
│   │       │   ├── index.blade.php
│   │       │   ├── bookings/
│   │       │   │   └── index.blade.php
│   │       │   ├── profile/
│   │       │   │   └── index.blade.php
│   │       │   ├── earnings/
│   │       │   │   └── index.blade.php
│   │       │   ├── reviews/
│   │       │   │   └── index.blade.php
│   │       │   └── notifications/
│   │       │       └── index.blade.php
│   │       ├── parent/
│   │       │   ├── index.blade.php
│   │       │   ├── bookings/
│   │       │   │   ├── index.blade.php
│   │       │   │   └── review.blade.php
│   │       │   ├── orders/
│   │       │   │   ├── index.blade.php
│   │       │   │   └── details.blade.php
│   │       │   ├── children/
│   │       │   │   └── index.blade.php
│   │       │   ├── saved-babysitters/
│   │       │   │   └── index.blade.php
│   │       │   ├── bookmarks/
│   │       │   │   └── index.blade.php
│   │       │   └── settings/
│   │       │       └── index.blade.php
│   │       ├── shop-owner/
│   │       │   ├── index.blade.php
│   │       │   ├── products/
│   │       │   │   ├── index.blade.php
│   │       │   │   ├── create.blade.php
│   │       │   │   └── edit.blade.php
│   │       │   ├── orders/
│   │       │   │   └── index.blade.php
│   │       │   ├── earnings/
│   │       │   │   └── index.blade.php
│   │       │   ├── profile/
│   │       │   │   └── index.blade.php
│   │       │   └── reviews/
│   │       │       └── index.blade.php
│   │       ├── doctor/
│   │       │   ├── index.blade.php
│   │       │   ├── posts/
│   │       │   │   ├── index.blade.php
│   │       │   │   ├── create.blade.php
│   │       │   │   └── edit.blade.php
│   │       │   ├── comments/
│   │       │   │   └── index.blade.php
│   │       │   ├── analytics/
│   │       │   │   └── index.blade.php
│   │       │   └── profile/
│   │       │       └── index.blade.php
│   │       └── support/
│   │           ├── index.blade.php
│   │           ├── tickets/
│   │           │   ├── index.blade.php
│   │           │   └── details.blade.php
│   │           ├── faqs/
│   │           │   └── index.blade.php
│   │           └── escalations/
│   │               └── index.blade.php
│   │
│   └── css/
│       ├── app.css                               ← compiled via Vite
│       └── dashboard.css
│
│
├── routes/
│   ├── web.php                                   ← public routes
│   ├── admin.php
│   ├── moderator.php
│   ├── babysitter.php
│   ├── parent.php
│   ├── shop-owner.php
│   ├── doctor.php
│   └── support.php
│
│
├── public/
│   ├── css/
│   │   ├── site.css
│   │   ├── dashboard.css
│   │   ├── marketplace.css
│   │   ├── blog.css
│   │   └── auth.css
│   ├── js/
│   │   ├── site.js
│   │   ├── dashboard.js
│   │   ├── notifications.js
│   │   ├── blog-editor.js
│   │   └── charts.js
│   ├── images/
│   │   ├── logos/
│   │   ├── icons/
│   │   ├── banners/
│   │   ├── placeholders/
│   │   └── empty-states/
│   └── uploads/
│       ├── avatars/
│       ├── babysitters/
│       ├── doctors/
│       ├── shops/
│       ├── products/
│       ├── blog/
│       ├── certificates/
│       └── temp/
│
│
├── config/
│   └── nanhacare.php                             ← platform-level config (pagination, upload limits)
│
├── .env
├── .env.example
├── composer.json
└── README.md
```

---

## Key Laravel Equivalents

| ASP.NET Concept | Laravel Equivalent |
|---|---|
| `ApplicationUser` | `User.php` extends `Authenticatable` |
| ASP.NET Core Identity roles | Spatie Laravel Permission |
| `[Authorize(Roles = "X")]` | `middleware(['auth', 'role:x'])` |
| Areas | `Controllers/Dashboard/{Role}/` + route files |
| FluentValidation | `app/Http/Requests/` (FormRequest) |
| `IHostedService` background job | `app/Console/Commands/` + `schedule()` in Kernel |
| SignalR | Laravel Echo + Pusher/Reverb |
| `TempData["Success"]` | `session()->flash('success', '...')` |
| EF Core migrations | `php artisan make:migration` |
| `DbSeeder.cs` | `database/seeders/DatabaseSeeder.php` |
| `_ViewImports.cshtml` | Not needed — Blade handles this globally |
| ViewComponents | Blade Components (`resources/views/components/`) |
| `PagedResult<T>` | Laravel `paginate()` built-in |
| MailKit SMTP | Laravel Mail + Mailables |
| `HttpContext.Session` (cart) | `session()` helper |
| `IFileUploadService` | `FileUploadService.php` + Laravel `Storage` facade |

---

## Memory Prompt
> Paste this at the start of any new Claude conversation about NanhaCare Laravel:

```
Project: NanhaCare — Pakistan childcare platform (Laravel version)
Stack: Laravel 11, MySQL, Spatie Permission (roles), Blade views, Bootstrap 5, Laravel Echo (real-time), Laravel Mail (SMTP), Laravel Storage (file uploads), scheduled commands (background jobs)

Roles: admin, moderator, parent, babysitter, shop_owner, doctor, support_agent
- Only parent/babysitter/shop_owner/doctor can self-register
- admin/moderator/support_agent assigned by admin only
- Each role has its own dashboard under /dashboard/{role}

Public routes: /, /babysitters, /babysitters/{id}, /marketplace, /marketplace/product/{id}, /shop/{slug}, /cart, /checkout (parent only), /blog, /blog/{slug}, /about, /contact, /pricing, /training, /notifications, /auth/*
Onboarding routes: /onboarding/babysitter|shop-owner|doctor|parent (after email confirmation)
Dashboard routes: /dashboard/admin|moderator|parent|babysitter|shop-owner|doctor|support

Models: User, BabysitterProfile, DoctorProfile, Booking, BookingChild, Child, BabysitterReview, SavedBabysitter, VerificationBadge, Shop, Product, ProductImage, ProductReview, Order, OrderItem, ReturnRequest, BlogPost, Comment, BlogBookmark, PostViewLog, SupportTicket, TicketReply, Faq, ReplyTemplate, PaymentDetail, PayoutRequest, UserSubscription, Notification, PlatformSetting, UserReport, FlaggedItem, Announcement, ModerationLog, RoleAssignmentLog, NotificationPreference, AccountDeletionRequest, ModeratorCategoryAssignment

Services (each has a Contract/Interface): BabysitterService, BookingService, MarketplaceService, ProductService, OrderService, BlogService, NotificationService, EmailService, FileUploadService, SupportTicketService, ModerationService, DashboardService, PaymentService, SubscriptionService, OnboardingService

Middleware: MaintenanceModeMiddleware, BanCheckMiddleware, RoleAreaGuardMiddleware
Background: ProcessAnnouncementsJob (every 5 min, checks Announcements where publish_at <= now && is_sent = false)
Validators: RegisterRequest, ContactFormRequest, CreateProductRequest, EditProductRequest, CreateBlogPostRequest, BookingRequest, CheckoutRequest, onboarding requests x4, TicketReplyRequest, AdminActionRequest

UI: Bootstrap 5, sky blue/baby pink/mint green/off-white/sunshine yellow palette, Nunito/Poppins fonts, TinyMCE for rich text (blog/product/FAQ), Chart.js for dashboard charts
Cart: stored in Laravel session as array
Uploads: stored in public/uploads/{category}/
Payment v1: Cash on Delivery only, card is placeholder

Ask for the structure file or specific chunk if you need context. Build one chunk at a time.
```
