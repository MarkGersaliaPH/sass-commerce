<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TransactionsResource\Pages;
use App\Filament\Resources\TransactionsResource\RelationManagers;
use App\Filament\Resources\TransactionsResource\RelationManagers\OrdersRelationManager;
use App\Models\Transaction; 
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Infolists\Components\Grid;
use Filament\Infolists\Components\Section;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Infolist;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\Summarizers\Sum;
use Filament\Tables\Columns\Summarizers\Summarizer;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table; 
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Database\Query\Builder;

class TransactionsResource extends Resource
{
    protected static ?string $model = Transaction::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';


    protected static ?string $recordTitleAttribute = 'order_transaction_id';


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
                ->summarize(Sum::make()->label('Total Shipping')), 
                TextColumn::make("total_amount")
                ->summarize(Sum::make('total_amount')),    
                TextColumn::make("orders_count")->counts('orders'),
                TextColumn::make("created_at"),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
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

    
    
    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                Section::make([
                    Grid::make(2)->schema([
                      TextEntry::make('shipping_fee')->label("Shipping"),
                    TextEntry::make('total_amount')
                    ])
                ])
            ]);
    }
}
