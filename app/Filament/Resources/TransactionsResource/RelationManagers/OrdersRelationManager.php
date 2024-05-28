<?php

namespace App\Filament\Resources\TransactionsResource\RelationManagers;

use App\Models\Order;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class OrdersRelationManager extends RelationManager
{
    protected static string $relationship = 'orders';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('order_id')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public function table(Table $table): Table
    {
         
        return $table
            ->recordTitleAttribute('order_id')
            ->columns([

                Tables\Columns\TextColumn::make('order_id')
                    ->sortable(), 
                    Tables\Columns\ImageColumn::make('store.avatar')->label('Seller'),
                Tables\Columns\TextColumn::make('order_items_count')
                    ->numeric()
                    ->label('Products')
                    ->counts('orderItems'),
                Tables\Columns\TextColumn::make('total_amount')
                ->money('PHP')  
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('status')
                    ->badge(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([

                Tables\Actions\ViewAction::make()
                    ->url(fn (Order $record): string => auth()->user()->isAdmin() ? route('filament.admin.resources.orders.view',  $record) :  route('filament.customer.resources.orders.view',  $record))
                    ->button()
                    ->openUrlInNewTab(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
