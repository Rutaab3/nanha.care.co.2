@php
    $role = auth()->user()->getRoleNames()[0] ?? 'parent';
    $currentRoute = request()->route()->getName();
@endphp
<nav class="sidebar-menu bg-gradient-sidebar text-on-gradient" style="width: 260px; position: fixed; top: 0; left: 0; bottom: 0; overflow-y: auto; z-index: 1030; transition: transform 0.3s;">
    <div class="p-3 border-bottom" style="border-color: rgba(255,255,255,0.1) !important;">
        <a href="{{ route('home') }}" class="text-decoration-none d-flex align-items-center gap-2 text-on-gradient">
            <i class="bi bi-heart-pulse-fill fs-4"></i>
            <span class="fw-bold fs-5">NanhaCare</span>
        </a>
    </div>
    <ul class="list-unstyled px-2 pt-2">
        @switch($role)
            @case('admin')
                <x-sidebar-item :route="'admin.dashboard'" :label="'Dashboard'" :icon="'speedometer2'" :current="$currentRoute" />
                <x-sidebar-item :route="'admin.users.index'" :label="'Users'" :icon="'people'" :current="$currentRoute" />
                <x-sidebar-item :route="'admin.users.create'" :label="'Create User'" :icon="'person-plus'" :current="$currentRoute" />
                <x-sidebar-item :route="'admin.roles.index'" :label="'Roles'" :icon="'shield-check'" :current="$currentRoute" />
                <x-sidebar-item :route="'admin.moderation.index'" :label="'Moderation'" :icon="'shield-exclamation'" :current="$currentRoute" />
                <x-sidebar-item :route="'admin.reports.index'" :label="'Reports'" :icon="'flag'" :current="$currentRoute" />
                <x-sidebar-item :route="'admin.settings.index'" :label="'Settings'" :icon="'gear'" :current="$currentRoute" />
                <x-sidebar-item :route="'admin.revenue.index'" :label="'Revenue'" :icon="'currency-dollar'" :current="$currentRoute" />
                <x-sidebar-item :route="'admin.announcements.index'" :label="'Announcements'" :icon="'megaphone'" :current="$currentRoute" />
                @break

            @case('moderator')
                <x-sidebar-item :route="'moderator.dashboard'" :label="'Dashboard'" :icon="'speedometer2'" :current="$currentRoute" />
                <x-sidebar-item :route="'moderator.queue.index'" :label="'Queue'" :icon="'inbox'" :current="$currentRoute" />
                <x-sidebar-item :route="'moderator.published.index'" :label="'Published'" :icon="'check-circle'" :current="$currentRoute" />
                <x-sidebar-item :route="'moderator.flagged.index'" :label="'Flagged'" :icon="'exclamation-triangle'" :current="$currentRoute" />
                <x-sidebar-item :route="'moderator.reports.index'" :label="'Reports'" :icon="'flag'" :current="$currentRoute" />
                <x-sidebar-item :route="'moderator.activity.index'" :label="'Activity'" :icon="'activity'" :current="$currentRoute" />
                @break

            @case('parent')
                <x-sidebar-item :route="'parent.dashboard'" :label="'Home'" :icon="'house'" :current="$currentRoute" />
                <x-sidebar-item :route="'parent.bookings.index'" :label="'Bookings'" :icon="'calendar-check'" :current="$currentRoute" />
                <x-sidebar-item :route="'parent.orders.index'" :label="'Orders'" :icon="'box'" :current="$currentRoute" />
                <x-sidebar-item :route="'parent.children.index'" :label="'Children'" :icon="'people'" :current="$currentRoute" />
                <x-sidebar-item :route="'parent.saved-babysitters.index'" :label="'Saved'" :icon="'bookmark-heart'" :current="$currentRoute" />
                <x-sidebar-item :route="'parent.bookmarks.index'" :label="'Bookmarks'" :icon="'bookmark'" :current="$currentRoute" />
                <x-sidebar-item :route="'parent.settings.index'" :label="'Settings'" :icon="'gear'" :current="$currentRoute" />
                @break

            @case('babysitter')
                <x-sidebar-item :route="'babysitter.dashboard'" :label="'Overview'" :icon="'speedometer2'" :current="$currentRoute" />
                <x-sidebar-item :route="'babysitter.bookings.index'" :label="'Bookings'" :icon="'calendar-check'" :current="$currentRoute" />
                <x-sidebar-item :route="'babysitter.profile.index'" :label="'Profile'" :icon="'person'" :current="$currentRoute" />
                <x-sidebar-item :route="'babysitter.earnings.index'" :label="'Earnings'" :icon="'currency-dollar'" :current="$currentRoute" />
                <x-sidebar-item :route="'babysitter.reviews.index'" :label="'Reviews'" :icon="'star'" :current="$currentRoute" />
                <x-sidebar-item :route="'babysitter.notifications.index'" :label="'Notifications'" :icon="'bell'" :current="$currentRoute" />
                @break

            @case('shop_owner')
                <x-sidebar-item :route="'shop-owner.dashboard'" :label="'Overview'" :icon="'speedometer2'" :current="$currentRoute" />
                <x-sidebar-item :route="'shop-owner.products.index'" :label="'Products'" :icon="'box'" :current="$currentRoute" />
                <x-sidebar-item :route="'shop-owner.orders.index'" :label="'Orders'" :icon="'cart'" :current="$currentRoute" />
                <x-sidebar-item :route="'shop-owner.earnings.index'" :label="'Earnings'" :icon="'currency-dollar'" :current="$currentRoute" />
                <x-sidebar-item :route="'shop-owner.profile.index'" :label="'Profile'" :icon="'person'" :current="$currentRoute" />
                <x-sidebar-item :route="'shop-owner.reviews.index'" :label="'Reviews'" :icon="'star'" :current="$currentRoute" />
                @break

            @case('doctor')
                <x-sidebar-item :route="'doctor.dashboard'" :label="'Overview'" :icon="'speedometer2'" :current="$currentRoute" />
                <x-sidebar-item :route="'doctor.posts.index'" :label="'Posts'" :icon="'file-text'" :current="$currentRoute" />
                <x-sidebar-item :route="'doctor.comments.index'" :label="'Comments'" :icon="'chat'" :current="$currentRoute" />
                <x-sidebar-item :route="'doctor.analytics.index'" :label="'Analytics'" :icon="'graph-up'" :current="$currentRoute" />
                <x-sidebar-item :route="'doctor.profile.index'" :label="'Profile'" :icon="'person'" :current="$currentRoute" />
                @break

            @case('support_agent')
                <x-sidebar-item :route="'support.dashboard'" :label="'Dashboard'" :icon="'speedometer2'" :current="$currentRoute" />
                <x-sidebar-item :route="'support.tickets.index'" :label="'Inbox'" :icon="'inbox'" :current="$currentRoute" />
                <x-sidebar-item :route="'support.faqs.index'" :label="'FAQs'" :icon="'question-circle'" :current="$currentRoute" />
                <x-sidebar-item :route="'support.escalations.index'" :label="'Escalations'" :icon="'exclamation-triangle'" :current="$currentRoute" />
                @break

            @default
                <x-sidebar-item :route="'parent.dashboard'" :label="'Dashboard'" :icon="'speedometer2'" :current="$currentRoute" />
        @endswitch
    </ul>
</nav>

<style>
    @media (max-width: 991.98px) {
        .sidebar-menu {
            transform: translateX(-100%);
        }
        .sidebar-menu.show {
            transform: translateX(0);
        }
    }
</style>
