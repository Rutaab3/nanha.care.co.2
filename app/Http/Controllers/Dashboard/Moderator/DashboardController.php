<?php

namespace App\Http\Controllers\Dashboard\Moderator;

use App\Contracts\IDashboardService;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function __construct(private IDashboardService $dashboardService) {}

    public function index()
    {
        $data = $this->dashboardService->getModeratorOverview();

        return view('dashboard.moderator.index', $data);
    }
}
