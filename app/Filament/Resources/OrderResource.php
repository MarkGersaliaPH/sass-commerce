<?php

namespace App\Filament\Resources;

use App\Enums\OrderStatus;
use App\Filament\Resources\OrderResource\Pages;
use App\Filament\Resources\OrderResource\RelationManagers;
use App\Models\Order;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

use Filament\Infolists\Components\Grid as ComponentsGrid;
use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\RepeatableEntry;
use Filament\Infolists\Components\Section as ComponentsSection;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Infolist;
use Filament\Tables\Columns\Summarizers\Sum;
use Filament\Tables\Grouping\Group;
use Illuminate\Database\Query\Builder as QueryBuilder;

class OrderResource extends Resource
{
    protected static ?string $model = Order::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';


    protected static ?string $recordTitleAttribute = 'order_id';
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
                Tables\Columns\TextColumn::make('order_id')
                ->sortable(), 
            Tables\Columns\TextColumn::make('order_items_count')
                ->numeric()
                ->label('Products')
                ->counts('orderItems'),
            Tables\Columns\TextColumn::make('total_amount')
                ->numeric()
                // ->summarize(Sum::make()->label('Total')->query(fn (QueryBuilder $query) => $query->where('status', OrderStatus::Completed))) 
                ->sortable(), 
            Tables\Columns\TextColumn::make('status')
                ->badge(),
            Tables\Columns\TextColumn::make('created_at')
                ->dateTime()
                ->sortable(),
            ])->defaultGroup('transaction_id')  
            ->groups([
                Group::make('transaction_id')
                    ->getTitleFromRecordUsing(fn (Order $record): string => ucfirst($record->transaction_id)),
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
            //
        ];
    }

    
    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                ComponentsGrid::make(3)->schema([
                    ComponentsGrid::make()->schema([
                        ComponentsSection::make('Status')->schema([
                            TextEntry::make('status')
                                ->label('')
                                ->badge(),

                        ]),
                        ComponentsSection::make('Shipping Details')
                            ->schema([
                                ComponentsGrid::make(3)->schema([
                                    TextEntry::make('name'),
                                    TextEntry::make('contact_no'),
                                    TextEntry::make('email'),
                                ])
                                    ->relationship('shipping_details'),
                                TextEntry::make('shipping_address_display'),
                            ]),

                        ComponentsSection::make('Seller')
                            ->schema([
                                ComponentsGrid::make(4)->schema([
                                    ImageEntry::make('avatar_url')->label('')
                                        ->height(50)
                                        ->square(),

                                    TextEntry::make('name'),
                                    TextEntry::make('contact_no'),
                                    TextEntry::make('email'),
                                ])
                                    ->relationship('store'),
                            ]),

                        ComponentsSection::make()
                            ->schema([
                                RepeatableEntry::make('orderItems')
                                    ->schema([
                                        ComponentsGrid::make(4)->schema([
                                            ImageEntry::make('product.image')->label('')
                                                ->height(50)
                                                ->square(),

                                            TextEntry::make('product.name'),
                                            TextEntry::make('qty'),
                                            TextEntry::make('unit_price')->money('PHP'),
                                        ]),
                                    ]),
                            ]),

                    ])->columnSpan(2),

                    ComponentsGrid::make()->schema([
                        ComponentsSection::make()
                            ->schema([
                                TextEntry::make('created_at')
                                    ->label('Ordered at'),
                                TextEntry::make('updated_at')
                                    ->label('Last updated'),
                            ]),
                        ComponentsSection::make('Billing')
                            ->schema([
                                TextEntry::make('shipping.shipping_fee')->money('PHP'),
                                TextEntry::make('tax')->money('PHP'),
                                TextEntry::make('total_amount')->money('PHP'),
                                TextEntry::make('payment_method')->badge(),

                            ]),
                    ])->columnSpan(1),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListOrders::route('/'),
            'create' => Pages\CreateOrder::route('/create'),
            'view' => Pages\ViewOrder::route('/{record}'),
            'edit' => Pages\EditOrder::route('/{record}/edit'),
        ];
    }
}
