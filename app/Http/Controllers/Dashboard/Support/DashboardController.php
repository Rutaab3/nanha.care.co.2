<?php

namespace App\Http\Controllers\Dashboard\Support;

use App\Contracts\IDashboardService;

class DashboardController
{
    public function __construct(
        protected IDashboardService $service
    ) {}

    public function index()
    {
        $data = $this->service->getSupportOverview(auth()->id());

        return view('dashboard.support.index', $data);
    }
}
