<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleAreaGuardMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        $segments = $request->segments();

        $roleSegment = null;
        foreach ($segments as $segment) {
            if (in_array($segment, ['admin', 'moderator', 'parent', 'babysitter', 'shop-owner', 'doctor', 'support'])) {
                $roleSegment = $segment;
                break;
            }
        }

        if ($roleSegment === null) {
            return $next($request);
        }

        $map = [
            'admin' => 'admin',
            'moderator' => 'moderator',
            'parent' => 'parent',
            'babysitter' => 'babysitter',
            'shop-owner' => 'shop_owner',
            'doctor' => 'doctor',
            'support' => 'support_agent',
        ];

        $mappedRole = $map[$roleSegment] ?? null;

        if ($mappedRole === null) {
            abort(403, 'Unauthorized area access');
        }

        if (auth()->user()->hasRole($mappedRole)) {
            return $next($request);
        }

        abort(403, 'Unauthorized area access');
    }
}
