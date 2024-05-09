<?php

namespace App\Filament\Resources\OrderResource\Widgets;

use App\Enums\OrderStatus;
use App\Models\Order;
use App\Models\Transaction;
use Carbon\Carbon;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class AdminOrderStats extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make(
                'Total Revenue',
                Transaction::whereHas('orders',function($q){
                    return $q->where('status',OrderStatus::Completed);
                })->sum('shipping_fee')
            )->description('Based on completed orders'),
            Stat::make(
                'Overall Sales',
                Order::where('status', OrderStatus::Completed)->sum('total_amount')
            )->description('Based on completed orders')
                ->color('success'),

            Stat::make(
                'Sales This Month',
                Order::where('status', OrderStatus::Completed)
                    ->whereBetween('created_at', [Carbon::now()->startOfMonth(), Carbon::now()->endOfMonth()])
                    ->sum('total_amount')
            )->description('Based on completed orders'),


            Stat::make('Total Orders', Order::count()),
            Stat::make('Pending Orders', Order::where('status', OrderStatus::New)->count()),
            Stat::make('Completed Orders', Order::where('status', OrderStatus::Completed)->count()),

        ];
    }
}
