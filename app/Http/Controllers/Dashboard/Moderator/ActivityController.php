<?php

namespace App\Http\Controllers\Dashboard\Moderator;

use App\Http\Controllers\Controller;
use App\Models\System\ModerationLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ActivityController extends Controller
{
    public function index(Request $request)
    {
        $logs = ModerationLog::where('moderator_id', Auth::id())
            ->orderBy('created_at', 'desc')
            ->paginate(15);

        return view('dashboard.moderator.activity.index', compact('logs'));
    }
}
