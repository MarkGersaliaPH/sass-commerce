<?php

namespace App\Filament\Store\Resources\StoreResource\Widgets;

use App\Enums\OrderStatus;
use App\Models\Order;
use App\Models\Product;
use Carbon\Carbon;
use Filament\Facades\Filament;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make(
                'Overall Sales',
                Order::whereStoreId(Filament::getTenant()->id)->where('status', OrderStatus::Completed)->sum('total_amount')
            )->description('Based on completed orders')
                ->color('success'),

            Stat::make(
                'Sales This Month',
                Order::whereStoreId(Filament::getTenant()->id)->where('status', OrderStatus::Completed)
                    ->whereBetween('created_at', [Carbon::now()->startOfMonth(), Carbon::now()->endOfMonth()])
                    ->sum('total_amount')
            )->description('Based on completed orders'),

            Stat::make(
                'Sales This Week',
                Order::whereStoreId(Filament::getTenant()->id)->where('status', OrderStatus::Completed)
                    ->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
                    ->sum('total_amount')
            )->description('Based on completed orders'),

            Stat::make('Total Orders', Order::whereStoreId(Filament::getTenant()->id)->count()),
            Stat::make('Completed Orders', Order::whereStoreId(Filament::getTenant()->id)->where('status', OrderStatus::Completed)->count()),

            Stat::make('Products', Product::whereStoreId(Filament::getTenant()->id)->count()),
        ];
    }
}
