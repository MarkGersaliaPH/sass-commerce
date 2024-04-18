<?php

namespace App\Filament\Store\Resources\OrdersResource\Widgets;

use App\Enums\OrderStatus;
use App\Models\Order;
use Filament\Facades\Filament;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class LatestOrders extends BaseWidget
{
    public function table(Table $table): Table
    {
        return $table
            ->query(Order::whereStoreId(Filament::getTenant()->id)->where('status', OrderStatus::New)->latest())
            ->columns([

                Tables\Columns\TextColumn::make('status')->badge(),
                Tables\Columns\TextColumn::make('order_id')->label("ID"),
                Tables\Columns\TextColumn::make('total_amount')
                ->label("Amount"),
                Tables\Columns\TextColumn::make('created_at')
                    ->sortable(),
            ])

            ->actions([
                Tables\Actions\ViewAction::make()
                    ->url(fn (Order $record): string => route('filament.store.resources.orders.edit', [Filament::getTenant(), $record]))
                    ->button()
                    ->openUrlInNewTab(),
            ]);
    }
}
