<?php

namespace App\Http\Middleware;

use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use Closure;
use Filament\Facades\Filament;
use Filament\Forms\Components\Builder;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ApplyTenantScopes
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        Product::addGlobalScope(
            fn(Builder $query) => $query->whereBelongsTo(Filament::getTenant())
        );
        
        Category::addGlobalScope(
            fn(Builder $query) => $query->whereBelongsTo(Filament::getTenant())
        );
        Order::addGlobalScope(
            fn(Builder $query) => $query->whereBelongsTo(Filament::getTenant())
        );
        
        return $next($request);
    }
}
