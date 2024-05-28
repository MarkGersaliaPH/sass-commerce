<?php

namespace App\Filament\Customer\Resources;

use App\Filament\Customer\Resources\TransactionsResource\Pages;
use App\Filament\Customer\Resources\TransactionsResource\RelationManagers;
use App\Filament\Resources\TransactionsResource\RelationManagers\OrdersRelationManager;
use App\Models\Transaction;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Infolists\Components\Grid;
use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\RepeatableEntry;
use Filament\Infolists\Components\Section;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Infolist;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\Summarizers\Sum;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TransactionsResource extends Resource
{
    protected static ?string $model = Transaction::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $recordTitleAttribute = 'order_transaction_id';

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->whereHas('orders', function ($q) {
            return $q->where('user_id', auth()->id());
        });
    }




    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                Section::make([
                    Grid::make(2)->schema([
                        TextEntry::make('shipping_fee')->label("Shipping"),
                        TextEntry::make('total_amount')
                    ])
                ]),
                Section::make([
                    RepeatableEntry::make('orders.orderItems')
                        ->schema([
                            ImageEntry::make('product.image')->label('')
                                ->height(50)
                                ->square(),

                            TextEntry::make('product.name'),
                            TextEntry::make('qty'),
                            TextEntry::make('unit_price')->money('PHP'),
                        ]),
                ])

            ]);
    }


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //

                TextColumn::make("order_transaction_id"),
                TextColumn::make("shipping_fee")
                    ->money('PHP'),
                // ->summarize(Sum::make()->label('Total Shipping')), 
                TextColumn::make("total_amount")
                    ->money('PHP'),
                // ->summarize(Sum::make('total_amount')),    
                TextColumn::make("orders_count")->counts('orders'),
                TextColumn::make("created_at"),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
            ])
            ->bulkActions([]);
    }

    public static function getRelations(): array
    {
        return [
            //

            OrdersRelationManager::class
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListTransactions::route('/'),
            'create' => Pages\CreateTransactions::route('/create'),
            'view' => Pages\ViewTransactions::route('/{record}'),
            'edit' => Pages\EditTransactions::route('/{record}/edit'),
        ];
    }
}
