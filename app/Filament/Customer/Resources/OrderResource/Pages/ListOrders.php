<?php

namespace App\Filament\Customer\Resources\OrderResource\Pages;

use App\Filament\Customer\Resources\OrderResource;
use Filament\Actions;
use Filament\Resources\Components\Tab;
use Filament\Resources\Pages\ListRecords;

class ListOrders extends ListRecords
{
    protected static string $resource = OrderResource::class;

    public function getTabs(): array
    {
        return [
            null => Tab::make('All'),
            'new' => Tab::make()->query(fn ($query) => $query->where('status', 'new')->where('user_id', auth()->id())),
            'processing' => Tab::make()->query(fn ($query) => $query->where('status', 'processing')->where('user_id', auth()->id())),
            'shipped' => Tab::make()->query(fn ($query) => $query->where('status', 'shipped')->where('user_id', auth()->id())),
            'completed' => Tab::make()->query(fn ($query) => $query->where('status', 'completed')->where('user_id', auth()->id())),
            'cancelled' => Tab::make()->query(fn ($query) => $query->where('status', 'cancelled')->where('user_id', auth()->id())),
        ];
    }

    protected function getHeaderActions(): array
    {
        return [
            // Actions\CreateAction::make(),
        ];
    }
}
