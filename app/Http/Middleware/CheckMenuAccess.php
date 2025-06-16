<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Menu;

class CheckMenuAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $currentRoute = $request->route()->getName();
        $user = auth()->user();

        // If user is not authenticated, redirect to login
        if (!$user) {
            return redirect()->route('login');
        }

        // Skip check for admin role
        if ($user->hasRole('admin')) {
            return $next($request);
        }

        // If user has no roles, assign default role (staff)
        if ($user->roles->isEmpty()) {
            $user->assignRole('staff');
        }

        // Get menu by route
        $menu = Menu::where('route', $currentRoute)
            ->where('is_active', true)
            ->first();

        if (!$menu) {
            return $next($request);
        }

        // Check if user has access to this menu
        $hasAccess = $menu->roles->intersect($user->roles)->isNotEmpty();

        if (!$hasAccess) {
            abort(403, 'Unauthorized action.');
        }

        return $next($request);
    }
}
