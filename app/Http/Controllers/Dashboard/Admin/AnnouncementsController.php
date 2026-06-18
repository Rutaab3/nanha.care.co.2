<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Contracts\INotificationService;
use App\Http\Controllers\Controller;
use App\Models\System\Announcement;
use Illuminate\Http\Request;

class AnnouncementsController extends Controller
{
    public function __construct(private INotificationService $notificationService) {}

    public function index()
    {
        $announcements = Announcement::paginate(15);

        return view('dashboard.admin.announcements.index', compact('announcements'));
    }

    public function create()
    {
        return view('dashboard.admin.announcements.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string',
            'target_roles' => 'nullable|array',
            'publish_at' => 'nullable|date',
        ]);

        $data['target_roles'] = $data['target_roles'] ?? [];
        $data['is_sent'] = false;

        $announcement = Announcement::create($data);

        if (is_null($announcement->publish_at) || $announcement->publish_at->isPast()) {
            $this->notificationService->broadcast($announcement->target_roles, $announcement->body);
            $announcement->update(['is_sent' => true]);
        }

        return redirect()->route('admin.announcements.index')->with('success', 'Announcement created successfully.');
    }
}
