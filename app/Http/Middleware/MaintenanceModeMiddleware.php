<?php

namespace App\Http\Middleware;

use App\Models\System\PlatformSetting;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class MaintenanceModeMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        if (PlatformSetting::get('maintenance_mode') === 'true') {
            if (str_starts_with($request->getRequestUri(), '/dashboard/admin')) {
                return $next($request);
            }

            return response()->view('errors.maintenance', [], 503);
        }

        return $next($request);
    }
}
