<?php

namespace App\Filament\Resources\OrderResource\Pages;

use App\Enums\OrderStatus;
use App\Filament\Resources\OrderResource;
use App\Models\Order;
use App\Services\OrderService;
use Filament\Actions;
use Filament\Actions\Action;
use Filament\Forms\Components\ToggleButtons;
use Filament\Resources\Pages\ViewRecord;

class ViewOrder extends ViewRecord
{
    protected static string $resource = OrderResource::class;
    protected function getHeaderActions(): array
    {
        return [
            Action::make('updateStatus')
                ->fillForm(fn (Order $record): array => [
                    'status' => $record->status,
                ])
                ->form([
                    ToggleButtons::make('status')
                        ->inline()
                        ->options(OrderStatus::class)
                        ->required(),
                ])
                ->action(function (array $data, Order $record) {
                    $record->status = $data['status'];
                    $record->save();
                    $record->load("orderItems", "orderItems.product"); 
                     
                    (new OrderService())->notify($record,$data); 
                }),
        ];
    }
}
