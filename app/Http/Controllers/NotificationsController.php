<?php

namespace App\Http\Controllers;

use App\Contracts\INotificationService;
use App\Models\System\Notification;

class NotificationsController extends Controller
{
    public function __construct(
        private readonly INotificationService $notificationService,
    ) {}

    public function index()
    {
        $notifications = Notification::where('user_id', auth()->id())
            ->orderByDesc('created_at')
            ->paginate(20);

        return view('notifications.index', compact('notifications'));
    }

    public function markRead($id)
    {
        $this->notificationService->markRead((int) $id, auth()->id());

        return back();
    }

    public function markAllRead()
    {
        $this->notificationService->markAllRead(auth()->id());

        return back()->with('success', 'All marked as read');
    }

    public function delete($id)
    {
        $this->notificationService->delete((int) $id, auth()->id());

        return back();
    }
}
