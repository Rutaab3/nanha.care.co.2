<?php

namespace App\Http\Controllers\Dashboard\Doctor;

use App\Models\Blog\BlogPost;
use App\Models\Blog\PostViewLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AnalyticsController
{
    public function index()
    {
        $posts = BlogPost::where('doctor_id', auth()->id())
            ->orderByDesc('created_at')
            ->get(['id', 'title', 'views', 'created_at']);

        return view('dashboard.doctor.analytics.index', compact('posts'));
    }

    public function chartData(Request $request)
    {
        $type = $request->get('type', 'views');
        $userId = auth()->id();

        return match ($type) {
            'views' => $this->viewsChart($userId),
            'categories' => $this->categoriesChart($userId),
            'cities' => $this->citiesChart($userId),
            default => response()->json(['error' => 'Invalid chart type'], 400),
        };
    }

    private function viewsChart(string $userId)
    {
        $postIds = BlogPost::where('doctor_id', $userId)->pluck('id');

        $data = PostViewLog::whereIn('blog_post_id', $postIds)
            ->where('viewed_at', '>=', now()->subWeeks(12))
            ->select(DB::raw('YEARWEEK(viewed_at, 1) as week'), DB::raw('count(*) as total'))
            ->groupBy('week')
            ->orderBy('week')
            ->get();

        return response()->json($data);
    }

    private function categoriesChart(string $userId)
    {
        $data = BlogPost::where('doctor_id', $userId)
            ->select('category', DB::raw('count(*) as total'))
            ->groupBy('category')
            ->get();

        return response()->json($data);
    }

    private function citiesChart(string $userId)
    {
        $postIds = BlogPost::where('doctor_id', $userId)->pluck('id');

        $data = PostViewLog::whereIn('blog_post_id', $postIds)
            ->select('city', DB::raw('count(*) as total'))
            ->whereNotNull('city')
            ->groupBy('city')
            ->orderByDesc('total')
            ->get();

        return response()->json($data);
    }
}
