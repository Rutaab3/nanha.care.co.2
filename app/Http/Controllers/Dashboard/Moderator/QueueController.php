<?php

namespace App\Http\Controllers\Dashboard\Moderator;

use App\Contracts\IModerationService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QueueController extends Controller
{
    public function __construct(private IModerationService $moderationService) {}

    public function index(Request $request)
    {
        $tab = $request->get('tab', 'product');
        $items = $this->moderationService->getQueue($tab);

        return view('dashboard.moderator.queue.index', compact('items', 'tab'));
    }

    public function approve(string $type, int $id)
    {
        $this->moderationService->approve($type, $id, Auth::id());

        return redirect()->back()->with('success', 'Item approved successfully.');
    }

    public function reject(Request $request, string $type, int $id)
    {
        $data = $request->validate(['reason' => 'required|string|max:1000']);
        $this->moderationService->reject($type, $id, $data['reason'], Auth::id());

        return redirect()->back()->with('success', 'Item rejected.');
    }

    public function requestRevision(Request $request, string $type, int $id)
    {
        $data = $request->validate(['note' => 'required|string|max:1000']);
        $this->moderationService->requestRevision($type, $id, $data['note'], Auth::id());

        return redirect()->back()->with('success', 'Revision requested.');
    }
}
