<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Contracts\IDashboardService;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function __construct(private IDashboardService $dashboardService) {}

    public function index()
    {
        $data = $this->dashboardService->getAdminOverview();

        return view('dashboard.admin.index', $data);
    }
}
