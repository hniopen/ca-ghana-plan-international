<?php

namespace App\Http\Middleware;

use Closure;

class CheckPermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     *
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // Get the required roles from the route
        $permissions = $this->getRequiredPermissionForRoute($request->route());
        // Check if a role is required for the route, and
        // if so, ensure that the user has that role.
        if ($request->user()->hasAnyPermission($permissions) || !$permissions) {
            return $next($request);
        }

        return response([
            'error' => [
                'code' => 'INSUFFICIENT_ROLE',
                'description' => 'You are not authorized to access this resource.',
            ],
        ], 401);
    }

    private function getRequiredPermissionForRoute($route)
    {
        $actions = $route->getAction();

        return isset($actions['permissions']) ? $actions['permissions'] : null;
    }
}
