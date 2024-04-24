<?php

namespace App\Filament\Store\Resources\OrderResource\Widgets;

use App\Models\Order;
use Carbon\Carbon;
use Filament\Facades\Filament;
use Filament\Widgets\ChartWidget;
use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;

class OrderChart extends ChartWidget
{
    protected static ?string $heading = 'Orders Chart';

    // protected int | string | array $columnSpan = 'full';
    public ?string $filter = 'this_week';

    protected function getFilters(): ?array
    {
        return [
            'this_week' => 'This week',
            'last_week' => 'Last Week',
            'this_month' => 'This Month',
            'last_month' => 'Last Month',
            'this_year' => 'This Year',
        ];
    }

    protected function getFilterForm()
    {

        $activeFilter = $this->filter;
        $start = null;
        $end = null;

        switch ($activeFilter) {
            case 'this_week':
                $start = now()->startOfWeek();
                $end = now()->endOfWeek();
                break;
            case 'last_week':
                $start = now()->startOfWeek()->subWeek();
                $end = now()->endOfWeek()->subWeek();
                break;
            case 'last_month':
                $start = now()->startOfMonth()->subMonth();
                $end = now()->endOfMonth()->subMonth();
                break;

            case 'this_year':
                $start = now()->startOfYear();
                $end = now()->endOfYear();
                break;
            case 'this_month':
                $start = now()->startOfMonth();
                $end = now()->endOfMonth();
                break;
        }

        return ['start' => $start, 'end' => $end];
    }

    protected function getData(): array
    {

        $filter = $this->getFilterForm();

        // Totals per month
        $data = Trend::query(Order::whereStoreId(Filament::getTenant()->id))
            ->between(
                start: $filter['start'],
                end: $filter['end'],
            );

        $data = $this->filter == 'this_year' ? $data->perMonth() : $data->perDay();
        $data = $data->count();

        $format = $this->filter == 'this_year' ? 'F' : 'M-d';

        return [
            'datasets' => [
                [
                    'label' => 'Orders',
                    'data' => $data->map(fn (TrendValue $value) => $value->aggregate),
                    'fill' => 'start',
                ],
            ],
            'labels' => $data->map(fn (TrendValue $value) => Carbon::parse($value->date)->format($format)),
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}
