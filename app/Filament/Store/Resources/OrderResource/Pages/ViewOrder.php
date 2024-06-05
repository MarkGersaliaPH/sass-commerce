<?php

namespace App\Filament\Store\Resources\OrderResource\Pages;

use App\Enums\OrderStatus;
use App\Events\OrderStatusNotifyEvent;
use App\Filament\Store\Resources\OrderResource;
use App\Models\Order;
use App\Services\OrderNotificationService;
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
                    // (new OrderNotificationService($record))->notify($data);

                    $record->status = $data['status'];
                    $record->save();

                    // if ($record->isDirty('status')) {
                        $record->load("orderItems", "orderItems.product");
                        event(new OrderStatusNotifyEvent($record, $data));
                    // }
                }),
        ];
    }
}
