<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Http\Controllers\Controller;
use App\Models\System\ModerationLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ModerationController extends Controller
{
    public function index()
    {
        $logs = ModerationLog::with('moderator')->paginate(15);

        return view('dashboard.admin.moderation.index', compact('logs'));
    }

    public function override(Request $request, $logId)
    {
        $log = ModerationLog::findOrFail($logId);

        $targetClass = $log->target_type;
        $target = $targetClass::find($log->target_id);

        if ($target) {
            $newStatus = $target->status === 'published' ? 'draft' : 'published';
            $target->update(['status' => $newStatus]);
        }

        ModerationLog::create([
            'moderator_id' => Auth::id(),
            'action' => 'override',
            'target_type' => $log->target_type,
            'target_id' => $log->target_id,
            'reason' => $request->input('reason', 'Admin override'),
            'submitted_at' => now(),
            'reviewed_at' => now(),
        ]);

        return redirect()->back()->with('success', 'Moderation override applied.');
    }
}
