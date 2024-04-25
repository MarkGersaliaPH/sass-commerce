<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$ROLES): Response
    {
        if (auth()->check()) {
            $user = auth()->user();

            $path = $request->path();

            // Check if the user is authorized based on the path
            if ($path == 'customer' && $user->isCustomer()) {
                return $next($request);
            }

            if ($path == 'admin' && $user->isAdmin()) {
                dd("IM HERE");
                return $next($request);
            }

            if ($path == 'store' && $user->isStore()) {
                return $next($request);
            }

            // If the user is not authorized for the requested path, return 401
            return abort(401);
        }

        // If the user is not logged in, proceed with the request
        return $next($request);
    }
}
