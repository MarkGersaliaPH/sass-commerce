<?php

namespace App\Filament\Resources\OrderResource\Pages;

use App\Filament\Resources\OrderResource;
use App\Filament\Resources\OrderResource\Widgets\AdminOrderStats;
use App\Filament\Store\Resources\OrderResource\Widgets\OrderStats;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

use Filament\Resources\Components\Tab;
class ListOrders extends ListRecords
{
    protected static string $resource = OrderResource::class;

    protected function getHeaderWidgets(): array
    {
        return [AdminOrderStats::class];
    }
    public function getTabs(): array
    {
        return [
            "All" => Tab::make(),
            'new' => Tab::make()->query(fn ($query) => $query->where('status', 'new')),
            'processing' => Tab::make()->query(fn ($query) => $query->where('status', 'processing')),
            'shipped' => Tab::make()->query(fn ($query) => $query->where('status', 'shipped')),
            'completed' => Tab::make()->query(fn ($query) => $query->where('status', 'completed')),
            'cancelled' => Tab::make()->query(fn ($query) => $query->where('status', 'cancelled')),
        ];
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
