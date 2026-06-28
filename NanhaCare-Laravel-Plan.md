# NanhaCare — Laravel Execution Plan
> Pakistan childcare platform. Solo dev. Beginner-friendly. AI-assisted chunk by chunk.
> Rule: never ask AI to do more than one chunk at a time. Review before next chunk.

---

## TECH STACK
| | |
|---|---|
| Framework | Laravel 11 |
| Database | MySQL |
| Auth + Roles | Laravel Breeze + Spatie Permission |
| Real-time | Laravel Echo + Pusher (free tier) |
| Rich Text | TinyMCE (CDN) |
| Charts | Chart.js (CDN) |
| Email | Laravel Mail + SMTP |
| File Uploads | Laravel Storage → `public/uploads/` |
| Cart | Laravel Session |
| CSS | Bootstrap 5 + custom CSS |
| JS | Vanilla JS + jQuery |

---

## ⚠️ RULES FOR AI TOOLS (TRAE / CODEX / ANYTHING)

1. **Give AI the scaffold prompt first (Step 0). Nothing else.**
2. **One chunk at a time. Always.**
3. **Paste only the files relevant to the current chunk as context.**
4. **Review every file before moving on.**
5. **Commit after every chunk.**
6. **Never say "now build the whole dashboard" — always name specific files.**

---

## STEP 0 — FULL DIRECTORY SCAFFOLD
> Paste this entire prompt to AI first. It creates all empty files and folders.
> This means AI knows the structure for every chunk and won't invent random paths.

```
Create the full NanhaCare Laravel project directory structure.
Create every folder and every file listed below as empty files.
Do not write any code inside them yet. Just create the structure.

app/Models/User.php
app/Models/Profiles/BabysitterProfile.php
app/Models/Profiles/DoctorProfile.php
app/Models/Babysitting/Booking.php
app/Models/Babysitting/BookingChild.php
app/Models/Babysitting/Child.php
app/Models/Babysitting/BabysitterReview.php
app/Models/Babysitting/SavedBabysitter.php
app/Models/Babysitting/VerificationBadge.php
app/Models/Marketplace/Product.php
app/Models/Marketplace/ProductImage.php
app/Models/Marketplace/ProductReview.php
app/Models/Marketplace/Shop.php
app/Models/Marketplace/Order.php
app/Models/Marketplace/OrderItem.php
app/Models/Marketplace/ReturnRequest.php
app/Models/Blog/BlogPost.php
app/Models/Blog/Comment.php
app/Models/Blog/BlogBookmark.php
app/Models/Blog/PostViewLog.php
app/Models/Support/SupportTicket.php
app/Models/Support/TicketReply.php
app/Models/Support/Faq.php
app/Models/Support/ReplyTemplate.php
app/Models/Payments/PaymentDetail.php
app/Models/Payments/PayoutRequest.php
app/Models/Payments/UserSubscription.php
app/Models/System/Notification.php
app/Models/System/PlatformSetting.php
app/Models/System/UserReport.php
app/Models/System/FlaggedItem.php
app/Models/System/Announcement.php
app/Models/System/ModerationLog.php
app/Models/System/RoleAssignmentLog.php
app/Models/System/NotificationPreference.php
app/Models/System/AccountDeletionRequest.php
app/Models/System/ModeratorCategoryAssignment.php

app/Enums/UserStatus.php
app/Enums/VerifiedStatus.php
app/Enums/BookingStatus.php
app/Enums/ContentStatus.php
app/Enums/OrderStatus.php
app/Enums/TicketStatus.php
app/Enums/TicketPriority.php
app/Enums/ProductCategory.php
app/Enums/BlogCategory.php
app/Enums/FaqStatus.php

app/DTOs/Cart/CartItemDto.php
app/DTOs/Cart/CartSummaryDto.php
app/DTOs/Address/AddressDto.php
app/DTOs/Notifications/NotificationDto.php
app/DTOs/Common/PagedResult.php

app/Contracts/IBabysitterService.php
app/Contracts/IBookingService.php
app/Contracts/IMarketplaceService.php
app/Contracts/IProductService.php
app/Contracts/IOrderService.php
app/Contracts/IBlogService.php
app/Contracts/INotificationService.php
app/Contracts/IEmailService.php
app/Contracts/IFileUploadService.php
app/Contracts/ISupportTicketService.php
app/Contracts/IModerationService.php
app/Contracts/IDashboardService.php
app/Contracts/IPaymentService.php
app/Contracts/ISubscriptionService.php
app/Contracts/IOnboardingService.php

app/Services/BabysitterService.php
app/Services/BookingService.php
app/Services/MarketplaceService.php
app/Services/ProductService.php
app/Services/OrderService.php
app/Services/BlogService.php
app/Services/NotificationService.php
app/Services/EmailService.php
app/Services/FileUploadService.php
app/Services/SupportTicketService.php
app/Services/ModerationService.php
app/Services/DashboardService.php
app/Services/PaymentService.php
app/Services/SubscriptionService.php
app/Services/OnboardingService.php

app/Http/Controllers/HomeController.php
app/Http/Controllers/AuthController.php
app/Http/Controllers/OnboardingController.php
app/Http/Controllers/BabysittersController.php
app/Http/Controllers/MarketplaceController.php
app/Http/Controllers/ShopController.php
app/Http/Controllers/BlogController.php
app/Http/Controllers/CartController.php
app/Http/Controllers/NotificationsController.php
app/Http/Controllers/ContactController.php
app/Http/Controllers/ErrorController.php

app/Http/Controllers/Dashboard/Admin/DashboardController.php
app/Http/Controllers/Dashboard/Admin/UsersController.php
app/Http/Controllers/Dashboard/Admin/RolesController.php
app/Http/Controllers/Dashboard/Admin/ModerationController.php
app/Http/Controllers/Dashboard/Admin/ReportsController.php
app/Http/Controllers/Dashboard/Admin/SettingsController.php
app/Http/Controllers/Dashboard/Admin/AnnouncementsController.php
app/Http/Controllers/Dashboard/Admin/RevenueController.php

app/Http/Controllers/Dashboard/Moderator/DashboardController.php
app/Http/Controllers/Dashboard/Moderator/QueueController.php
app/Http/Controllers/Dashboard/Moderator/PublishedController.php
app/Http/Controllers/Dashboard/Moderator/FlaggedController.php
app/Http/Controllers/Dashboard/Moderator/ReportsController.php
app/Http/Controllers/Dashboard/Moderator/ActivityController.php

app/Http/Controllers/Dashboard/Babysitter/DashboardController.php
app/Http/Controllers/Dashboard/Babysitter/BookingsController.php
app/Http/Controllers/Dashboard/Babysitter/ProfileController.php
app/Http/Controllers/Dashboard/Babysitter/EarningsController.php
app/Http/Controllers/Dashboard/Babysitter/ReviewsController.php
app/Http/Controllers/Dashboard/Babysitter/NotificationsController.php

app/Http/Controllers/Dashboard/Parent/DashboardController.php
app/Http/Controllers/Dashboard/Parent/BookingsController.php
app/Http/Controllers/Dashboard/Parent/OrdersController.php
app/Http/Controllers/Dashboard/Parent/ChildrenController.php
app/Http/Controllers/Dashboard/Parent/SavedBabysittersController.php
app/Http/Controllers/Dashboard/Parent/BookmarksController.php
app/Http/Controllers/Dashboard/Parent/SettingsController.php

app/Http/Controllers/Dashboard/ShopOwner/DashboardController.php
app/Http/Controllers/Dashboard/ShopOwner/ProductsController.php
app/Http/Controllers/Dashboard/ShopOwner/OrdersController.php
app/Http/Controllers/Dashboard/ShopOwner/EarningsController.php
app/Http/Controllers/Dashboard/ShopOwner/ProfileController.php
app/Http/Controllers/Dashboard/ShopOwner/ReviewsController.php

app/Http/Controllers/Dashboard/Doctor/DashboardController.php
app/Http/Controllers/Dashboard/Doctor/PostsController.php
app/Http/Controllers/Dashboard/Doctor/CommentsController.php
app/Http/Controllers/Dashboard/Doctor/AnalyticsController.php
app/Http/Controllers/Dashboard/Doctor/ProfileController.php

app/Http/Controllers/Dashboard/Support/DashboardController.php
app/Http/Controllers/Dashboard/Support/TicketsController.php
app/Http/Controllers/Dashboard/Support/FaqsController.php
app/Http/Controllers/Dashboard/Support/EscalationsController.php

app/Http/Middleware/MaintenanceModeMiddleware.php
app/Http/Middleware/BanCheckMiddleware.php
app/Http/Middleware/RoleAreaGuardMiddleware.php

app/Http/Requests/Auth/RegisterRequest.php
app/Http/Requests/ContactFormRequest.php
app/Http/Requests/Products/CreateProductRequest.php
app/Http/Requests/Products/EditProductRequest.php
app/Http/Requests/Blog/CreateBlogPostRequest.php
app/Http/Requests/BookingRequest.php
app/Http/Requests/CheckoutRequest.php
app/Http/Requests/Onboarding/BabysitterOnboardingRequest.php
app/Http/Requests/Onboarding/ShopOwnerOnboardingRequest.php
app/Http/Requests/Onboarding/DoctorOnboardingRequest.php
app/Http/Requests/Onboarding/ParentOnboardingRequest.php
app/Http/Requests/Support/TicketReplyRequest.php
app/Http/Requests/Admin/AdminActionRequest.php

app/Helpers/SlugHelper.php
app/Helpers/FileHelper.php
app/Helpers/DateTimeHelper.php
app/Helpers/CurrencyHelper.php

app/Jobs/ProcessAnnouncementsJob.php

app/Events/BookingCreated.php
app/Events/BookingAccepted.php
app/Events/BookingCompleted.php
app/Events/OrderPlaced.php
app/Events/ProductSubmitted.php
app/Events/BlogPostSubmitted.php
app/Events/TicketCreated.php
app/Events/AnnouncementPublished.php

app/Listeners/SendBookingNotification.php
app/Listeners/SendOrderNotification.php
app/Listeners/SendModerationNotification.php
app/Listeners/SendAnnouncementNotification.php

app/Providers/AppServiceProvider.php
app/Console/Commands/ProcessAnnouncements.php

routes/web.php
routes/admin.php
routes/moderator.php
routes/babysitter.php
routes/parent.php
routes/shop-owner.php
routes/doctor.php
routes/support.php

resources/views/layouts/app.blade.php
resources/views/layouts/dashboard.blade.php
resources/views/partials/_navbar.blade.php
resources/views/partials/_footer.blade.php
resources/views/partials/_babysitter-card.blade.php
resources/views/partials/_product-card.blade.php
resources/views/partials/_toast.blade.php
resources/views/partials/_confirm-modal.blade.php
resources/views/partials/_pagination.blade.php
resources/views/partials/_star-rating.blade.php
resources/views/components/notification-bell.blade.php
resources/views/components/sidebar-menu.blade.php
resources/views/components/stats-card.blade.php

resources/views/home/index.blade.php
resources/views/home/about.blade.php
resources/views/home/pricing.blade.php
resources/views/home/training.blade.php
resources/views/auth/login.blade.php
resources/views/auth/register.blade.php
resources/views/auth/forgot-password.blade.php
resources/views/auth/reset-password.blade.php
resources/views/auth/confirm-email.blade.php
resources/views/auth/check-email.blade.php
resources/views/auth/suspended.blade.php
resources/views/onboarding/babysitter.blade.php
resources/views/onboarding/shop-owner.blade.php
resources/views/onboarding/doctor.blade.php
resources/views/onboarding/parent.blade.php
resources/views/babysitters/index.blade.php
resources/views/babysitters/profile.blade.php
resources/views/marketplace/index.blade.php
resources/views/marketplace/detail.blade.php
resources/views/cart/index.blade.php
resources/views/cart/checkout.blade.php
resources/views/blog/index.blade.php
resources/views/blog/detail.blade.php
resources/views/shop/public.blade.php
resources/views/contact/index.blade.php
resources/views/notifications/index.blade.php
resources/views/errors/401.blade.php
resources/views/errors/404.blade.php
resources/views/errors/500.blade.php

resources/views/dashboard/admin/index.blade.php
resources/views/dashboard/admin/users/index.blade.php
resources/views/dashboard/admin/users/details.blade.php
resources/views/dashboard/admin/users/edit.blade.php
resources/views/dashboard/admin/roles/index.blade.php
resources/views/dashboard/admin/moderation/index.blade.php
resources/views/dashboard/admin/reports/index.blade.php
resources/views/dashboard/admin/settings/index.blade.php
resources/views/dashboard/admin/revenue/index.blade.php
resources/views/dashboard/admin/announcements/index.blade.php
resources/views/dashboard/admin/announcements/create.blade.php

resources/views/dashboard/moderator/index.blade.php
resources/views/dashboard/moderator/queue/index.blade.php
resources/views/dashboard/moderator/published/index.blade.php
resources/views/dashboard/moderator/flagged/index.blade.php
resources/views/dashboard/moderator/reports/index.blade.php
resources/views/dashboard/moderator/activity/index.blade.php

resources/views/dashboard/babysitter/index.blade.php
resources/views/dashboard/babysitter/bookings/index.blade.php
resources/views/dashboard/babysitter/profile/index.blade.php
resources/views/dashboard/babysitter/earnings/index.blade.php
resources/views/dashboard/babysitter/reviews/index.blade.php
resources/views/dashboard/babysitter/notifications/index.blade.php

resources/views/dashboard/parent/index.blade.php
resources/views/dashboard/parent/bookings/index.blade.php
resources/views/dashboard/parent/bookings/review.blade.php
resources/views/dashboard/parent/orders/index.blade.php
resources/views/dashboard/parent/orders/details.blade.php
resources/views/dashboard/parent/children/index.blade.php
resources/views/dashboard/parent/saved-babysitters/index.blade.php
resources/views/dashboard/parent/bookmarks/index.blade.php
resources/views/dashboard/parent/settings/index.blade.php

resources/views/dashboard/shop-owner/index.blade.php
resources/views/dashboard/shop-owner/products/index.blade.php
resources/views/dashboard/shop-owner/products/create.blade.php
resources/views/dashboard/shop-owner/products/edit.blade.php
resources/views/dashboard/shop-owner/orders/index.blade.php
resources/views/dashboard/shop-owner/earnings/index.blade.php
resources/views/dashboard/shop-owner/profile/index.blade.php
resources/views/dashboard/shop-owner/reviews/index.blade.php

resources/views/dashboard/doctor/index.blade.php
resources/views/dashboard/doctor/posts/index.blade.php
resources/views/dashboard/doctor/posts/create.blade.php
resources/views/dashboard/doctor/posts/edit.blade.php
resources/views/dashboard/doctor/comments/index.blade.php
resources/views/dashboard/doctor/analytics/index.blade.php
resources/views/dashboard/doctor/profile/index.blade.php

resources/views/dashboard/support/index.blade.php
resources/views/dashboard/support/tickets/index.blade.php
resources/views/dashboard/support/tickets/details.blade.php
resources/views/dashboard/support/faqs/index.blade.php
resources/views/dashboard/support/escalations/index.blade.php

public/css/site.css
public/css/dashboard.css
public/css/marketplace.css
public/css/blog.css
public/css/auth.css
public/js/site.js
public/js/dashboard.js
public/js/notifications.js
public/js/blog-editor.js
public/js/charts.js

database/seeders/RoleSeeder.php
database/seeders/AdminUserSeeder.php
database/seeders/PlatformSettingsSeeder.php
database/seeders/FaqSeeder.php
```

---

## ✅ MASTER TO-DO LIST

---

### CHUNK 1 — Foundation
> Install Laravel, packages, configure database. No AI needed for this — do it yourself.

- [ ] `composer create-project laravel/laravel nanhacare`
- [ ] `composer require spatie/laravel-permission`
- [ ] `composer require laravel/breeze` then `php artisan breeze:install blade`
- [ ] Configure `.env` — DB name, SMTP, APP_NAME=NanhaCare, APP_URL
- [ ] Run `php artisan migrate` (Breeze migrations)
- [ ] Publish Spatie config: `php artisan vendor:publish --provider="Spatie\Permission\PermissionServiceProvider"`
- [ ] Add Spatie migration: `php artisan migrate`
- [ ] Add `HasRoles` trait to `User.php`
- [ ] Register middleware in `bootstrap/app.php`: `MaintenanceModeMiddleware`, `BanCheckMiddleware`
- [ ] Require all role route files in `routes/web.php`

**AI prompt:**
```
I have a fresh Laravel 11 project with Spatie Permission and Laravel Breeze installed.
Update User.php to use the HasRoles trait from Spatie.
Update AppServiceProvider to bind all Contracts to their Service implementations.
Show me bootstrap/app.php with MaintenanceModeMiddleware and BanCheckMiddleware registered.
Show me routes/web.php that requires admin.php, moderator.php, babysitter.php, parent.php, shop-owner.php, doctor.php, support.php.
```

---

### CHUNK 2 — Enums
> Simple PHP enums. No dependencies. Do all 10 at once — they're tiny.

- [ ] `UserStatus` — Active, Suspended, Banned
- [ ] `VerifiedStatus` — Pending, Verified, Rejected
- [ ] `BookingStatus` — Pending, Confirmed, Completed, Cancelled, Disputed
- [ ] `ContentStatus` — Draft, UnderReview, Published, Rejected, Archived
- [ ] `OrderStatus` — Processing, Shipped, Delivered, Cancelled, Returned
- [ ] `TicketStatus` — New, Open, InProgress, Resolved, Closed, Escalated
- [ ] `TicketPriority` — Low, Medium, High, Urgent
- [ ] `ProductCategory` — Newborns, Toddlers, Preschoolers, SchoolAge
- [ ] `BlogCategory` — NewbornCare, InfantNutrition, SleepTraining, ChildDevelopment, Vaccinations, MentalHealth
- [ ] `FaqStatus` — Draft, Published

**AI prompt:**
```
Write all 10 PHP 8.1 backed enums for the NanhaCare project.
Place them in app/Enums/.
UserStatus: Active, Suspended, Banned
VerifiedStatus: Pending, Verified, Rejected
BookingStatus: Pending, Confirmed, Completed, Cancelled, Disputed
ContentStatus: Draft, UnderReview, Published, Rejected, Archived
OrderStatus: Processing, Shipped, Delivered, Cancelled, Returned
TicketStatus: New, Open, InProgress, Resolved, Closed, Escalated
TicketPriority: Low, Medium, High, Urgent
ProductCategory: Newborns, Toddlers, Preschoolers, SchoolAge
BlogCategory: NewbornCare, InfantNutrition, SleepTraining, ChildDevelopment, Vaccinations, MentalHealth
FaqStatus: Draft, Published
Use string backed enums with a label() method returning a readable string.
```

---

### CHUNK 3 — Models
> Do domain by domain. Never all at once.

#### 3a — User + Profiles
- [ ] `User.php` — fillable, HasRoles, relationships to BabysitterProfile, DoctorProfile, Bookings, Orders, Notifications
- [ ] `BabysitterProfile.php` — belongsTo User, has VerificationBadges, BabysitterReviews
- [ ] `DoctorProfile.php` — belongsTo User

**AI prompt:**
```
Write these Laravel Eloquent models for NanhaCare.
Use app/Enums/ for status casts.
User.php: fillable (name, email, password, phone, city, status, avatar), HasRoles trait, relationships: hasOne BabysitterProfile, hasOne DoctorProfile, hasMany Booking (as parent and babysitter), hasMany Order, hasMany Notification, hasMany SupportTicket
BabysitterProfile.php: belongsTo User, fillable (bio, hourly_rate, experience_years, specializations as JSON, verified_status cast to VerifiedStatus enum, cnic, avatar, availability as JSON), hasMany BabysitterReview, hasMany VerificationBadge
DoctorProfile.php: belongsTo User, fillable (license_number, specialization, hospital, pmdc_number, profile_photo)
```

#### 3b — Babysitting Models
- [ ] `Booking.php`
- [ ] `BookingChild.php`
- [ ] `Child.php`
- [ ] `BabysitterReview.php`
- [ ] `SavedBabysitter.php`
- [ ] `VerificationBadge.php`

**AI prompt:**
```
Write Eloquent models for NanhaCare Babysitting domain.
Booking.php: belongsTo User (as parent_id), belongsTo User (as babysitter_id), hasMany BookingChild, fillable (parent_id, babysitter_id, date, start_time, duration_hours, location, notes, total_fee, status cast BookingStatus, decline_reason)
BookingChild.php: belongsTo Booking, belongsTo Child
Child.php: belongsTo User (parent_id), fillable (name, dob, gender, allergies, special_needs)
BabysitterReview.php: belongsTo Booking, fillable (parent_id, babysitter_id, rating, comment, reply, is_flagged)
SavedBabysitter.php: belongsTo User (parent_id), belongsTo BabysitterProfile
VerificationBadge.php: belongsTo BabysitterProfile, fillable (badge_code, city, issued_at)
```

#### 3c — Marketplace Models
- [ ] `Shop.php`
- [ ] `Product.php`
- [ ] `ProductImage.php`
- [ ] `ProductReview.php`
- [ ] `Order.php`
- [ ] `OrderItem.php`
- [ ] `ReturnRequest.php`

**AI prompt:**
```
Write Eloquent models for NanhaCare Marketplace domain.
Shop.php: belongsTo User (owner_id), hasMany Product, fillable (name, slug, logo, banner, description, contact_info, return_policy)
Product.php: belongsTo Shop, hasMany ProductImage, hasMany ProductReview, fillable (name, description, price, sale_price, stock_qty, category cast ProductCategory, age_tags JSON, weight, is_featured, status cast ContentStatus)
ProductImage.php: belongsTo Product, fillable (path, is_primary)
ProductReview.php: belongsTo Product, belongsTo User, fillable (rating, comment, is_flagged)
Order.php: belongsTo User (parent_id), hasMany OrderItem, fillable (shipping_address JSON, payment_method, status cast OrderStatus, total)
OrderItem.php: belongsTo Order, belongsTo Product, fillable (qty, unit_price, total)
ReturnRequest.php: belongsTo Order, fillable (reason, status)
```

#### 3d — Blog Models
- [ ] `BlogPost.php`
- [ ] `Comment.php`
- [ ] `BlogBookmark.php`
- [ ] `PostViewLog.php`

**AI prompt:**
```
Write Eloquent models for NanhaCare Blog domain.
BlogPost.php: belongsTo User (doctor_id), hasMany Comment, fillable (title, slug, content, excerpt, cover_image, category cast BlogCategory, tags JSON, read_time_minutes, views, status cast ContentStatus, published_at)
Comment.php: belongsTo BlogPost, belongsTo User, fillable (content, reply, is_flagged)
BlogBookmark.php: belongsTo User (parent_id), belongsTo BlogPost
PostViewLog.php: belongsTo BlogPost, fillable (user_id nullable, city, ip_address, viewed_at)
```

#### 3e — Support Models
- [ ] `SupportTicket.php`
- [ ] `TicketReply.php`
- [ ] `Faq.php`
- [ ] `ReplyTemplate.php`

#### 3f — Payment Models
- [ ] `PaymentDetail.php`
- [ ] `PayoutRequest.php`
- [ ] `UserSubscription.php`

#### 3g — System Models
- [ ] `Notification.php`
- [ ] `PlatformSetting.php`
- [ ] `UserReport.php`
- [ ] `FlaggedItem.php`
- [ ] `Announcement.php`
- [ ] `ModerationLog.php`
- [ ] `RoleAssignmentLog.php`
- [ ] `NotificationPreference.php`
- [ ] `AccountDeletionRequest.php`
- [ ] `ModeratorCategoryAssignment.php`

---

### CHUNK 4 — Migrations
> One migration per model. Do in same order as models (3a → 3g).

- [ ] `create_users_table` (update default — add phone, city, status, avatar)
- [ ] `create_babysitter_profiles_table`
- [ ] `create_doctor_profiles_table`
- [ ] `create_bookings_table`
- [ ] `create_booking_children_table`
- [ ] `create_children_table`
- [ ] `create_babysitter_reviews_table`
- [ ] `create_saved_babysitters_table`
- [ ] `create_verification_badges_table`
- [ ] `create_shops_table`
- [ ] `create_products_table`
- [ ] `create_product_images_table`
- [ ] `create_product_reviews_table`
- [ ] `create_orders_table`
- [ ] `create_order_items_table`
- [ ] `create_return_requests_table`
- [ ] `create_blog_posts_table`
- [ ] `create_comments_table`
- [ ] `create_blog_bookmarks_table`
- [ ] `create_post_view_logs_table`
- [ ] `create_support_tickets_table`
- [ ] `create_ticket_replies_table`
- [ ] `create_faqs_table`
- [ ] `create_reply_templates_table`
- [ ] `create_payment_details_table`
- [ ] `create_payout_requests_table`
- [ ] `create_user_subscriptions_table`
- [ ] `create_notifications_table`
- [ ] `create_platform_settings_table`
- [ ] `create_user_reports_table`
- [ ] `create_flagged_items_table`
- [ ] `create_announcements_table`
- [ ] `create_moderation_logs_table`
- [ ] `create_role_assignment_logs_table`
- [ ] `create_notification_preferences_table`
- [ ] `create_account_deletion_requests_table`
- [ ] `create_moderator_category_assignments_table`
- [ ] Run `php artisan migrate`

**AI prompt per group (example for bookings):**
```
Write Laravel migrations for NanhaCare Babysitting domain.
Based on these models: Booking, BookingChild, Child, BabysitterReview, SavedBabysitter, VerificationBadge.
Use proper foreign keys with constrained(). Use string for status fields (enum values stored as strings). Use json for JSON fields.
```

---

### CHUNK 5 — Seeders

- [ ] `RoleSeeder.php` — create 7 roles: admin, moderator, parent, babysitter, shop_owner, doctor, support_agent
- [ ] `AdminUserSeeder.php` — create 1 admin user from .env values, assign admin role
- [ ] `PlatformSettingsSeeder.php` — insert default key-value rows (commission_percent, booking_fee, maintenance_mode=false, subscription pricing)
- [ ] `FaqSeeder.php` — 5 sample FAQs with Published status
- [ ] Update `DatabaseSeeder.php` to call all 4 seeders in order
- [ ] Run `php artisan db:seed`

**AI prompt:**
```
Write NanhaCare seeders.
RoleSeeder: use Spatie Permission to create these roles: admin, moderator, parent, babysitter, shop_owner, doctor, support_agent
AdminUserSeeder: create a user from config (name=Admin, email from env ADMIN_EMAIL, password from env ADMIN_PASSWORD), assign admin role
PlatformSettingsSeeder: insert rows into platform_settings table with these keys: commission_percent (value 10), booking_fee_pkr (value 500), maintenance_mode (value false), plan_free_price (value 0), plan_basic_price (value 999), plan_premium_price (value 1999)
FaqSeeder: 5 sample FAQs using Published status, categories from BlogCategory enum
DatabaseSeeder: call all 4 in correct order
```

---

### CHUNK 6 — Contracts (Interfaces)
> All 15 interfaces. Do all at once — they're just method signatures, no logic.

- [ ] All 15 contract files written with method signatures only

**AI prompt:**
```
Write 15 Laravel service contract interfaces for NanhaCare in app/Contracts/.
Each interface should have method signatures only (no implementation).

IBabysitterService: getFeatured(), getAll(array $filters), getById(int $id), getCompletionPercentage(string $userId)
IBookingService: getByBabysitter(string $userId, ?string $status), getByParent(string $userId, ?string $status), create(array $data), accept(int $id, string $userId), decline(int $id, string $userId, string $reason), complete(int $id, string $userId)
IMarketplaceService: getProducts(array $filters), getProductById(int $id), getRelatedProducts(int $productId)
IProductService: getByShopOwner(string $userId, array $filters), create(array $data, string $userId), update(int $id, array $data, string $userId), delete(int $id, string $userId), duplicate(int $id, string $userId)
IOrderService: getByParent(string $userId), getByShopOwner(string $userId), create(array $data, string $userId), updateStatus(int $id, string $status, string $userId), requestReturn(int $id, string $reason, string $userId)
IBlogService: getPosts(array $filters), getBySlug(string $slug), getByDoctor(string $userId, ?string $status), create(array $data, string $userId), update(int $id, array $data, string $userId), addComment(int $postId, string $content, string $userId)
INotificationService: send(string $userId, string $type, string $message, ?string $link), markRead(int $id, string $userId), markAllRead(string $userId), delete(int $id, string $userId), broadcast(array $roles, string $message)
IEmailService: sendWelcome(string $userId), sendBookingConfirmation(int $bookingId), sendOrderConfirmation(int $orderId), sendPasswordReset(string $email, string $token), sendContactReply(int $ticketId)
IFileUploadService: save(mixed $file, string $category, ?string $userId): string, delete(string $path): bool
ISupportTicketService: getAll(array $filters), getById(int $id), create(array $data, string $userId), reply(int $id, string $reply, string $agentId, bool $isInternal), assign(int $id, string $agentId), escalate(int $id), close(int $id, string $agentId)
IModerationService: getQueue(?string $type), approve(string $type, int $id, string $moderatorId), reject(string $type, int $id, string $reason, string $moderatorId), requestRevision(string $type, int $id, string $note, string $moderatorId), getPublished(?string $type), getFlagged(), dismissFlag(int $id), escalateFlag(int $id)
IDashboardService: getAdminOverview(), getModeratorOverview(), getBabysitterOverview(string $userId), getParentOverview(string $userId), getShopOwnerOverview(string $userId), getDoctorOverview(string $userId), getSupportOverview(string $userId)
IPaymentService: createPayoutRequest(string $userId, float $amount), getPayoutHistory(string $userId), getTransactionHistory(string $userId), savePaymentDetails(string $userId, array $data)
ISubscriptionService: getActive(string $userId), getPlans(), subscribe(string $userId, string $plan)
IOnboardingService: saveBabysitter(string $userId, array $data), saveShopOwner(string $userId, array $data), saveDoctor(string $userId, array $data), saveParent(string $userId, array $data)
```

---

### CHUNK 7 — Services
> One service at a time. Most complex chunk. Take your time.

Do in this order (least dependent → most dependent):

- [ ] `FileUploadService.php` — uses Laravel Storage, no other services
- [ ] `EmailService.php` — uses Laravel Mail
- [ ] `NotificationService.php` — uses Notification model
- [ ] `OnboardingService.php` — uses profile models + FileUploadService
- [ ] `BabysitterService.php` — uses BabysitterProfile, BabysitterReview
- [ ] `BlogService.php` — uses BlogPost, Comment
- [ ] `ProductService.php` — uses Product, ProductImage, FileUploadService
- [ ] `MarketplaceService.php` — uses Product, Shop (read-only)
- [ ] `OrderService.php` — uses Order, OrderItem, NotificationService
- [ ] `BookingService.php` — uses Booking, NotificationService, EmailService
- [ ] `SupportTicketService.php` — uses SupportTicket, TicketReply, EmailService
- [ ] `ModerationService.php` — uses Product, BlogPost, ModerationLog, NotificationService
- [ ] `PaymentService.php` — uses PaymentDetail, PayoutRequest
- [ ] `SubscriptionService.php` — uses UserSubscription, PlatformSetting
- [ ] `DashboardService.php` — uses all models for aggregate stats

**AI prompt per service (example):**
```
Write BookingService.php for NanhaCare implementing IBookingService.
It lives in app/Services/BookingService.php.
Inject INotificationService and IEmailService via constructor.
Use Booking, BookingChild, Child models.
Implement: getByBabysitter (paginated, filter by status), getByParent (paginated, filter by status), create (validates babysitter is verified, creates booking record), accept (checks babysitter ownership, updates status, sends notification + email), decline (checks ownership, updates status with reason, sends notification), complete (checks ownership, updates status, triggers notification)
Enforce ownership: always check userId matches before any write.
```

---

### CHUNK 8 — Middleware

- [ ] `MaintenanceModeMiddleware.php` — check PlatformSetting maintenance_mode=true, return maintenance view, except admin routes
- [ ] `BanCheckMiddleware.php` — if auth user status=Banned, logout and redirect to /auth/suspended
- [ ] `RoleAreaGuardMiddleware.php` — check user role matches the dashboard prefix they're accessing

**AI prompt:**
```
Write 3 middleware for NanhaCare.
MaintenanceModeMiddleware: query PlatformSettings where key=maintenance_mode and value=true. If true, return view('errors.maintenance') for all routes EXCEPT those starting with /dashboard/admin. Allow admin through always.
BanCheckMiddleware: if user is authenticated and user->status === UserStatus::Banned, log them out and redirect to route('auth.suspended').
RoleAreaGuardMiddleware: extract the first segment of the URL after /dashboard/ (e.g. admin, parent, babysitter). Check if auth user has the corresponding Spatie role. If not, abort(403).
```

---

### CHUNK 9 — Requests (Validators)

- [ ] `RegisterRequest.php` — email, password, confirm_password, phone (Pakistani 03xxxxxxxxxx format), name, city, role (only: parent, babysitter, shop_owner, doctor)
- [ ] `ContactFormRequest.php` — name, email, phone, subject, message
- [ ] `CreateProductRequest.php` — name, description, price, category, stock_qty, images array, max 5 images
- [ ] `EditProductRequest.php` — same as create minus images required
- [ ] `CreateBlogPostRequest.php` — title, slug, content, category, excerpt max 200, cover_image
- [ ] `BookingRequest.php` — babysitter_id, date (future date), start_time, duration_hours, child_ids array
- [ ] `CheckoutRequest.php` — name, address, city, phone, payment_method
- [ ] `BabysitterOnboardingRequest.php` — bio, experience_years, specializations, hourly_rate, cnic, certifications array
- [ ] `ShopOwnerOnboardingRequest.php` — business_name, category, cnic, bank_details
- [ ] `DoctorOnboardingRequest.php` — license_number, specialization, hospital, pmdc_number, profile_photo
- [ ] `ParentOnboardingRequest.php` — children_count, age_ranges
- [ ] `TicketReplyRequest.php` — reply content, is_internal_note bool
- [ ] `AdminActionRequest.php` — action, reason, duration

---

### CHUNK 10 — Routes

- [ ] `routes/web.php` — public routes + require all role files
- [ ] `routes/admin.php`
- [ ] `routes/moderator.php`
- [ ] `routes/babysitter.php`
- [ ] `routes/parent.php`
- [ ] `routes/shop-owner.php`
- [ ] `routes/doctor.php`
- [ ] `routes/support.php`

**AI prompt:**
```
Write all NanhaCare route files.

routes/web.php — public routes (no auth required):
GET / → HomeController@index
GET /about → HomeController@about
GET /pricing → HomeController@pricing
GET /training → HomeController@training
GET /babysitters → BabysittersController@index
GET /babysitters/{id} → BabysittersController@profile
GET /marketplace → MarketplaceController@index
GET /marketplace/product/{id} → MarketplaceController@detail
GET /shop/{slug} → ShopController@public
GET /blog → BlogController@index
GET /blog/{slug} → BlogController@detail
POST /blog/{id}/comment → BlogController@addComment [auth]
GET /cart → CartController@index
POST /cart/add → CartController@add
POST /cart/remove → CartController@remove
POST /cart/update → CartController@update
GET /checkout → CartController@checkout [auth, role:parent]
POST /checkout → CartController@placeOrder [auth, role:parent]
GET /auth/login → AuthController@loginForm
POST /auth/login → AuthController@login
GET /auth/register → AuthController@registerForm
POST /auth/register → AuthController@register
GET /auth/logout → AuthController@logout
GET /auth/confirm-email → AuthController@confirmEmail
GET /auth/check-email → AuthController@checkEmail
GET /auth/forgot-password → AuthController@forgotPasswordForm
POST /auth/forgot-password → AuthController@forgotPassword
GET /auth/reset-password → AuthController@resetPasswordForm
POST /auth/reset-password → AuthController@resetPassword
GET /auth/suspended → AuthController@suspended
GET /onboarding/babysitter → OnboardingController@babysitter [auth]
POST /onboarding/babysitter → OnboardingController@saveBabysitter [auth]
GET /onboarding/shop-owner → OnboardingController@shopOwner [auth]
POST /onboarding/shop-owner → OnboardingController@saveShopOwner [auth]
GET /onboarding/doctor → OnboardingController@doctor [auth]
POST /onboarding/doctor → OnboardingController@saveDoctor [auth]
GET /onboarding/parent → OnboardingController@parent [auth]
POST /onboarding/parent → OnboardingController@saveParent [auth]
GET /contact → ContactController@index
POST /contact → ContactController@submit
GET /notifications → NotificationsController@index [auth]
POST /notifications/mark-read/{id} → NotificationsController@markRead [auth]
POST /notifications/mark-all-read → NotificationsController@markAllRead [auth]
POST /notifications/delete/{id} → NotificationsController@delete [auth]
GET /error/{code} → ErrorController@index
Then require all role route files.

routes/admin.php — prefix /dashboard/admin, middleware [auth, role:admin]:
GET / → Admin\DashboardController@index
GET /users → Admin\UsersController@index
GET /users/{id} → Admin\UsersController@details
GET /users/{id}/edit → Admin\UsersController@edit
POST /users/{id}/suspend → Admin\UsersController@suspend
POST /users/{id}/ban → Admin\UsersController@ban
POST /users/{id}/restore → Admin\UsersController@restore
POST /users/{id}/delete → Admin\UsersController@destroy
GET /roles → Admin\RolesController@index
POST /roles/assign → Admin\RolesController@assign
GET /moderation → Admin\ModerationController@index
POST /moderation/override/{logId} → Admin\ModerationController@override
GET /reports → Admin\ReportsController@index
GET /reports/users-per-week → Admin\ReportsController@usersPerWeek
GET /reports/bookings-per-day → Admin\ReportsController@bookingsPerDay
GET /reports/top-products → Admin\ReportsController@topProducts
GET /reports/city-usage → Admin\ReportsController@cityUsage
GET /reports/export → Admin\ReportsController@export
GET /settings → Admin\SettingsController@index
POST /settings → Admin\SettingsController@save
GET /revenue → Admin\RevenueController@index
GET /announcements → Admin\AnnouncementsController@index
GET /announcements/create → Admin\AnnouncementsController@create
POST /announcements → Admin\AnnouncementsController@store

Write similar route files for moderator, babysitter, parent, shop-owner, doctor, support — all under /dashboard/{role} prefix with their respective role middleware.
```

---

### CHUNK 11 — Public Controllers

Do one controller at a time.

- [ ] `HomeController.php` — index, about, pricing (loads PlatformSettings), training
- [ ] `AuthController.php` — loginForm, login (role redirect), registerForm, register, logout, confirmEmail, checkEmail, forgotPassword x2, resetPassword x2, suspended
- [ ] `OnboardingController.php` — 4 form/save pairs, calls IOnboardingService
- [ ] `BabysittersController.php` — index (filter, paginate), profile (by id)
- [ ] `MarketplaceController.php` — index (filter by category, paginate), detail
- [ ] `ShopController.php` — public (by slug, loads shop + live products)
- [ ] `BlogController.php` — index (filter by category, paginate), detail (by slug), addComment
- [ ] `CartController.php` — index (read session), add, remove, update, checkout (GET), placeOrder (POST → create Order)
- [ ] `ContactController.php` — index (loads FAQs), submit (creates SupportTicket + sends email)
- [ ] `NotificationsController.php` — index, markRead, markAllRead, delete
- [ ] `ErrorController.php` — index (by code)

**AI prompt per controller (example):**
```
Write CartController.php for NanhaCare.
Cart is stored in session as an array of CartItemDto (product_id, name, price, qty, image).
index(): read cart from session, calculate total, return view cart/index
add(Request $request): add product_id to session cart, redirect back
remove(Request $request): remove product_id from session cart, redirect back
update(Request $request): update qty for product_id in session cart, redirect back
checkout(): middleware [auth, role:parent], load cart from session, return view cart/checkout
placeOrder(CheckoutRequest $request): validate, create Order record + OrderItems from session cart, clear cart session, call INotificationService and IEmailService, redirect to order confirmation
```

---

### CHUNK 12 — Dashboard Controllers
> One role at a time. Each role is its own sub-chunk.

#### 12a — Admin Dashboard
- [ ] `Admin/DashboardController.php` — loads stats via IDashboardService@getAdminOverview
- [ ] `Admin/UsersController.php` — index (paginated + filtered), details, edit, suspend, ban, restore, destroy
- [ ] `Admin/RolesController.php` — index, assign (calls UserManager equivalent)
- [ ] `Admin/ModerationController.php` — index (ModerationLogs table), override
- [ ] `Admin/ReportsController.php` — index + 4 JSON endpoints + CSV export
- [ ] `Admin/SettingsController.php` — index (loads PlatformSettings), save (updates key-value rows)
- [ ] `Admin/RevenueController.php` — index (aggregated revenue data)
- [ ] `Admin/AnnouncementsController.php` — index, create form, store

#### 12b — Moderator Dashboard
- [ ] `Moderator/DashboardController.php`
- [ ] `Moderator/QueueController.php` — index (tab=products|blogs), approve, reject, requestRevision
- [ ] `Moderator/PublishedController.php` — index, unpublish
- [ ] `Moderator/FlaggedController.php` — index, dismiss, unpublish, escalate, warn, ban-request
- [ ] `Moderator/ReportsController.php` — UserReports table
- [ ] `Moderator/ActivityController.php` — ModerationLogs filtered by current moderator

#### 12c — Babysitter Dashboard
- [ ] `Babysitter/DashboardController.php` — overview stats via IDashboardService
- [ ] `Babysitter/BookingsController.php` — index (tabs), accept, decline, complete, reportIssue
- [ ] `Babysitter/ProfileController.php` — index, update (with file upload)
- [ ] `Babysitter/EarningsController.php` — index, chartData (JSON), payoutRequest
- [ ] `Babysitter/ReviewsController.php` — index, reply, flag
- [ ] `Babysitter/NotificationsController.php` — index

#### 12d — Parent Dashboard
- [ ] `Parent/DashboardController.php`
- [ ] `Parent/BookingsController.php` — index (tabs), review form, store review, reportIssue
- [ ] `Parent/OrdersController.php` — index, details, requestReturn
- [ ] `Parent/ChildrenController.php` — index, store, update, destroy
- [ ] `Parent/SavedBabysittersController.php` — index, save, remove
- [ ] `Parent/BookmarksController.php` — index, save, remove
- [ ] `Parent/SettingsController.php` — index, updateProfile, changePassword, updateNotificationPrefs, requestAccountDeletion

#### 12e — ShopOwner Dashboard
- [ ] `ShopOwner/DashboardController.php`
- [ ] `ShopOwner/ProductsController.php` — index, create, store, edit, update, duplicate, archive, destroy
- [ ] `ShopOwner/OrdersController.php` — index, updateStatus, cancel
- [ ] `ShopOwner/EarningsController.php` — index, payoutRequest, chartData
- [ ] `ShopOwner/ProfileController.php` — index, update (shop profile with logo/banner upload)
- [ ] `ShopOwner/ReviewsController.php` — index, reply, flag

#### 12f — Doctor Dashboard
- [ ] `Doctor/DashboardController.php`
- [ ] `Doctor/PostsController.php` — index, create, store, edit, update, destroy
- [ ] `Doctor/CommentsController.php` — index, reply, flag
- [ ] `Doctor/AnalyticsController.php` — index, chartData (JSON)
- [ ] `Doctor/ProfileController.php` — index, update

#### 12g — Support Dashboard
- [ ] `Support/DashboardController.php`
- [ ] `Support/TicketsController.php` — index (filter), details, reply, assign, bulkClose, bulkReassign
- [ ] `Support/FaqsController.php` — index, store, update, destroy, reorder
- [ ] `Support/EscalationsController.php` — index, flagToAdmin

**AI prompt per role (example for Babysitter):**
```
Write all 6 Babysitter dashboard controllers for NanhaCare.
Namespace: App\Http\Controllers\Dashboard\Babysitter
All controllers protected with middleware(['auth', 'role:babysitter'])
Inject relevant services via constructor (IBookingService, IBabysitterService, INotificationService, IPaymentService)

DashboardController: index() calls IDashboardService->getBabysitterOverview(auth()->id()), returns view dashboard/babysitter/index
BookingsController: index() calls IBookingService->getByBabysitter() with tab query param as status filter. accept($id), decline($id), complete($id), reportIssue($id) — all enforce ownership via service.
ProfileController: index() loads BabysitterProfile for auth user. update() handles file uploads via IFileUploadService, saves profile.
EarningsController: index() loads earnings data. chartData() returns JSON for Chart.js. payoutRequest() creates PayoutRequest record.
ReviewsController: index() paginates BabysitterReviews. reply($id), flag($id).
NotificationsController: index() paginates Notifications for auth user.
```

---

### CHUNK 13 — Background Jobs + Events

- [ ] `ProcessAnnouncementsJob.php` — query Announcements where publish_at <= now and is_sent = false, call INotificationService@broadcast per announcement, mark is_sent = true
- [ ] `ProcessAnnouncements.php` (command) — dispatches job
- [ ] Schedule command in `Console/Kernel.php` → every 5 minutes
- [ ] `EventServiceProvider.php` — register all Events → Listeners mappings
- [ ] Write all 4 Listener files (SendBookingNotification, SendOrderNotification, SendModerationNotification, SendAnnouncementNotification)

**AI prompt:**
```
Write NanhaCare background job system.
ProcessAnnouncementsJob: query Announcements model where publish_at <= now() and is_sent = false. For each, call app(INotificationService::class)->broadcast() with target_roles and message. Set is_sent = true and save.
ProcessAnnouncements command: dispatches ProcessAnnouncementsJob.
Register in Kernel schedule: $schedule->command(ProcessAnnouncements::class)->everyFiveMinutes()
EventServiceProvider: register BookingCreated → SendBookingNotification, OrderPlaced → SendOrderNotification, ProductSubmitted/BlogPostSubmitted → SendModerationNotification, AnnouncementPublished → SendAnnouncementNotification.
SendBookingNotification listener: on BookingCreated event, call INotificationService->send() for both parent and babysitter with appropriate messages.
```

---

### CHUNK 14 — UI: Layouts + Partials
> UI starts here. Backend is complete. Now render it.

- [ ] `layouts/app.blade.php` — Bootstrap 5 CDN, Google Fonts (Nunito+Poppins), CSS variables (sky blue, baby pink, mint green, off-white, sunshine yellow), navbar include, footer include, toast include, @yield('content')
- [ ] `layouts/dashboard.blade.php` — sidebar include, topbar with notification bell, @yield('content'), toast include, confirm modal include
- [ ] `partials/_navbar.blade.php` — brand logo, public nav links, auth buttons (login/register if guest, user dropdown if logged in)
- [ ] `partials/_footer.blade.php` — Quick Links, Blog, Marketplace, Terms, Privacy, Sitemap, Emergency contacts
- [ ] `partials/_toast.blade.php` — reads session flash (success, error, warning), Bootstrap toast auto-show
- [ ] `partials/_confirm-modal.blade.php` — generic Bootstrap modal for destructive actions
- [ ] `partials/_babysitter-card.blade.php` — photo, badge, name, city, rating stars, specializations, hourly rate, view profile button
- [ ] `partials/_product-card.blade.php` — image, name, price, shop name, rating, add to cart button
- [ ] `partials/_pagination.blade.php` — Bootstrap pagination links from Laravel paginator
- [ ] `partials/_star-rating.blade.php` — CSS star rating display (pass $rating variable)
- [ ] `components/notification-bell.blade.php` — bell icon, unread count badge, dropdown last 10 notifications
- [ ] `components/sidebar-menu.blade.php` — role-specific sidebar links (check auth()->user()->getRoleNames())
- [ ] `components/stats-card.blade.php` — icon, label, value, color variant

**AI prompt:**
```
Write NanhaCare layouts and partials.
Color palette CSS variables: --sky-blue: #87CEEB, --baby-pink: #FFB6C1, --mint-green: #98D8C8, --off-white: #FAF9F6, --sunshine-yellow: #FFD700, --dark-text: #2D3436
Font: Nunito for body, Poppins for headings — Google Fonts CDN
Bootstrap 5 CDN

layouts/app.blade.php: full HTML, imports CSS variables and fonts, includes partials/_navbar, partials/_toast, @yield('content'), partials/_footer
layouts/dashboard.blade.php: sidebar (components/sidebar-menu), topbar with brand + notification bell + user dropdown, main content area @yield('content'), partials/_toast, partials/_confirm-modal
partials/_navbar: NanhaCare logo left, nav links (Home, Babysitters, Marketplace, Blog, Pricing), right side: if guest show Login+Register buttons, if auth show user name + role badge + logout
components/sidebar-menu: switch on auth()->user()->getRoleNames()[0] to show role-specific nav items. Admin: Overview/Users/Roles/Moderation/Reports/Settings/Revenue/Announcements. Moderator: Queue/Published/Flagged/Reports/Activity. Parent: Home/Bookings/Orders/Children/Saved/Bookmarks/Settings. Babysitter: Overview/Bookings/Profile/Earnings/Reviews/Notifications. ShopOwner: Overview/Products/Orders/Earnings/Profile/Reviews. Doctor: Overview/Posts/Comments/Analytics/Profile. Support: Inbox/Tickets/FAQs/Escalations
components/stats-card: accepts $icon, $label, $value, $color — Bootstrap card with icon circle
```

---

### CHUNK 15 — UI: Public Views

- [ ] `home/index.blade.php` — hero, safety features (3 cards), how it works (3 steps), verification process (4 steps), featured babysitters (loop _babysitter-card), coming soon, testimonials
- [ ] `home/about.blade.php` — mission, values, team, Pakistan trust signals
- [ ] `home/pricing.blade.php` — 3 subscription tiers from $plans variable
- [ ] `home/training.blade.php` — steps, requirements, apply button
- [ ] `auth/login.blade.php` — email, password, remember me, forgot password link
- [ ] `auth/register.blade.php` — name, email, phone, password, confirm, city, role dropdown (parent/babysitter/shop_owner/doctor only)
- [ ] `auth/forgot-password.blade.php`
- [ ] `auth/reset-password.blade.php`
- [ ] `auth/confirm-email.blade.php`
- [ ] `auth/check-email.blade.php` — message + resend link
- [ ] `auth/suspended.blade.php` — ban reason + until date
- [ ] `onboarding/babysitter.blade.php` — bio, experience, specializations checkboxes, cnic, certifications upload, hourly rate, availability grid
- [ ] `onboarding/shop-owner.blade.php` — business name, category, cnic, bank details
- [ ] `onboarding/doctor.blade.php` — license number, specialization, hospital, pmdc, photo upload
- [ ] `onboarding/parent.blade.php` — number of children, age ranges
- [ ] `babysitters/index.blade.php` — filter form (city, experience, rate, specialization, availability), sorted paginated cards grid
- [ ] `babysitters/profile.blade.php` — full bio, photo, badges, hourly rate, working hours, reviews, book now button
- [ ] `marketplace/index.blade.php` — category pill filters, paginated product cards grid
- [ ] `marketplace/detail.blade.php` — image carousel, description, seller box, reviews, related products, add to cart
- [ ] `cart/index.blade.php` — items table with qty inputs, remove buttons, total, proceed to checkout
- [ ] `cart/checkout.blade.php` — address form, order summary, payment method, place order button
- [ ] `blog/index.blade.php` — category tabs, paginated article cards
- [ ] `blog/detail.blade.php` — full article, author bio box, related articles, comment section
- [ ] `shop/public.blade.php` — shop header (logo, banner, name), live products grid
- [ ] `contact/index.blade.php` — contact form, FAQ accordion (grouped by category), emergency numbers
- [ ] `notifications/index.blade.php` — paginated notifications list, mark all read button
- [ ] `errors/401.blade.php`, `errors/404.blade.php`, `errors/500.blade.php`

---

### CHUNK 16 — UI: Dashboard Views
> One role at a time. Same order as controllers.

#### 16a — Admin Views
- [ ] `admin/index.blade.php` — stats cards (6 stats), activity feed, platform health
- [ ] `admin/users/index.blade.php` — searchable filterable table, action buttons
- [ ] `admin/users/details.blade.php` — full user profile view
- [ ] `admin/users/edit.blade.php` — edit form
- [ ] `admin/roles/index.blade.php` — user search + role dropdown
- [ ] `admin/moderation/index.blade.php` — moderation logs table + override button
- [ ] `admin/reports/index.blade.php` — 4 Chart.js charts + CSV export button
- [ ] `admin/settings/index.blade.php` — settings form (commission, fees, maintenance toggle, TinyMCE for email templates/ToS)
- [ ] `admin/revenue/index.blade.php` — revenue breakdown
- [ ] `admin/announcements/index.blade.php` — announcements table
- [ ] `admin/announcements/create.blade.php` — create form (title, body, target role, schedule)

#### 16b — Moderator Views
- [ ] `moderator/index.blade.php` — overview stats
- [ ] `moderator/queue/index.blade.php` — two tabs (products/blogs), each with approve/reject/revision buttons
- [ ] `moderator/published/index.blade.php` — published content table with unpublish button
- [ ] `moderator/flagged/index.blade.php` — flagged items with action buttons
- [ ] `moderator/reports/index.blade.php` — user reports table
- [ ] `moderator/activity/index.blade.php` — my moderation log

#### 16c — Babysitter Views
- [ ] `babysitter/index.blade.php` — verification status card, stats cards, upcoming booking
- [ ] `babysitter/bookings/index.blade.php` — tabs (pending/confirmed/completed/cancelled), booking cards with actions
- [ ] `babysitter/profile/index.blade.php` — edit form with file upload, completion percentage bar, preview button
- [ ] `babysitter/earnings/index.blade.php` — monthly chart, bookings table, payout form, bank details
- [ ] `babysitter/reviews/index.blade.php` — reviews list, reply form, flag button
- [ ] `babysitter/notifications/index.blade.php` — notifications list

#### 16d — Parent Views
- [ ] `parent/index.blade.php` — welcome card, quick actions, upcoming bookings, recommended babysitters, new blogs
- [ ] `parent/bookings/index.blade.php` — tabs, booking cards, review/report/rebook buttons
- [ ] `parent/bookings/review.blade.php` — star rating + comment form
- [ ] `parent/orders/index.blade.php` — orders table with status badges
- [ ] `parent/orders/details.blade.php` — full order breakdown, return button
- [ ] `parent/children/index.blade.php` — children list, add/edit form
- [ ] `parent/saved-babysitters/index.blade.php` — saved cards with quick-book
- [ ] `parent/bookmarks/index.blade.php` — bookmarked articles list
- [ ] `parent/settings/index.blade.php` — profile form, password form, notification prefs checkboxes, delete account request

#### 16e — ShopOwner Views
- [ ] `shop-owner/index.blade.php` — stats cards, best-sellers chart, pending orders alert
- [ ] `shop-owner/products/index.blade.php` — products table (status badges, filter, actions)
- [ ] `shop-owner/products/create.blade.php` — full product form with TinyMCE, multi-image upload, age tags
- [ ] `shop-owner/products/edit.blade.php` — same as create, prepopulated
- [ ] `shop-owner/orders/index.blade.php` — orders table, status update dropdown
- [ ] `shop-owner/earnings/index.blade.php` — revenue chart, transaction history, payout form
- [ ] `shop-owner/profile/index.blade.php` — shop edit form (name, logo, banner upload, description, return policy)
- [ ] `shop-owner/reviews/index.blade.php` — product reviews list, reply form

#### 16f — Doctor Views
- [ ] `doctor/index.blade.php` — stats, most read article, rejection card
- [ ] `doctor/posts/index.blade.php` — posts table (status badges, actions)
- [ ] `doctor/posts/create.blade.php` — TinyMCE editor, cover image upload, category, tags, auto slug, auto read time
- [ ] `doctor/posts/edit.blade.php` — same as create, prepopulated
- [ ] `doctor/comments/index.blade.php` — comments per post, reply form, flag button
- [ ] `doctor/analytics/index.blade.php` — views line chart, category bar chart, city pie chart
- [ ] `doctor/profile/index.blade.php` — edit doctor profile form

#### 16g — Support Views
- [ ] `support/index.blade.php` — ticket inbox table (all tickets, filterable)
- [ ] `support/tickets/index.blade.php` — filtered list with bulk actions, SLA timer
- [ ] `support/tickets/details.blade.php` — full ticket thread, reply form with template dropdown, internal note toggle, assign agent
- [ ] `support/faqs/index.blade.php` — FAQ CRUD table, add/edit form, drag reorder
- [ ] `support/escalations/index.blade.php` — escalated tickets, flag to admin button

---

### CHUNK 17 — Assets (CSS + JS)

- [ ] `public/css/site.css` — CSS variables, public page styles
- [ ] `public/css/dashboard.css` — sidebar, topbar, dashboard card styles
- [ ] `public/css/marketplace.css` — product card, cart, checkout styles
- [ ] `public/css/blog.css` — article typography, author box, comment section
- [ ] `public/css/auth.css` — auth form centered layout, onboarding steps
- [ ] `public/js/site.js` — navbar toggle, smooth scroll, toast auto-show
- [ ] `public/js/dashboard.js` — sidebar collapse, table row hover, bulk checkboxes
- [ ] `public/js/notifications.js` — Pusher Echo subscription, append new notification to bell dropdown
- [ ] `public/js/blog-editor.js` — TinyMCE init, auto slug from title, auto read time from word count
- [ ] `public/js/charts.js` — Chart.js helper to fetch JSON endpoints and render charts

---

## QUICK REFERENCE — AI CONTEXT SNIPPETS

When starting a new AI chat for any chunk, paste this at the top:

```
NanhaCare: Pakistan childcare platform.
Stack: Laravel 11, MySQL, Spatie Permission, Bootstrap 5, Blade views.
Roles: admin, moderator, parent, babysitter, shop_owner, doctor, support_agent.
Namespace: App\Http\Controllers\Dashboard\{Role} for dashboards.
All services injected via constructor. All writes enforce ownership before executing.
Enums in app/Enums/ (UserStatus, VerifiedStatus, BookingStatus, ContentStatus, OrderStatus, TicketStatus, TicketPriority, ProductCategory, BlogCategory, FaqStatus).
Cart stored in Laravel session as array. File uploads via IFileUploadService → public/uploads/{category}/.
Dashboard routes: /dashboard/admin|moderator|parent|babysitter|shop-owner|doctor|support.
Public routes: /, /babysitters, /marketplace, /blog, /shop/{slug}, /cart, /checkout, /auth/*, /onboarding/*.
Now write only: [NAME THE SPECIFIC FILE]
```
