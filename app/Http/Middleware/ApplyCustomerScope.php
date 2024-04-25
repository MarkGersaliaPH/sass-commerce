<?php

namespace App\Http\Middleware;

use App\Models\Order;
use App\Models\UserAddress;
use Closure;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ApplyCustomerScope
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        Order::addGlobalScope(
            fn (Builder $query) => $query->whereUserId(auth()->id())
        );
        
        UserAddress::addGlobalScope(
            fn (Builder $query) => $query->whereUserId(auth()->id())
        );

        return $next($request);
    }
}
