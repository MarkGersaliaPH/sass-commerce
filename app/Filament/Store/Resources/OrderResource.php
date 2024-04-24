<?php

namespace App\Filament\Store\Resources;

use App\Filament\Store\Resources\OrderResource\Pages;
use App\Models\Order;
use Filament\Facades\Filament;
use Filament\Forms\Form;
use Filament\Infolists\Components\Grid as ComponentsGrid;
use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\RepeatableEntry;
use Filament\Infolists\Components\Section as ComponentsSection;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Infolist;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class OrderResource extends Resource
{
    protected static ?string $model = Order::class;

    protected static bool $canCreate = false;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Shop';

    protected static ?string $recordTitleAttribute = 'order_id';

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::whereStoreId(Filament::getTenant()->id)->count();
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
                                TextEntry::make('created_at'),
                            ]),
                        ComponentsSection::make('Billing')
                            ->schema([
                                TextEntry::make('shipping_fee')->money('PHP'),
                                TextEntry::make('tax')->money('PHP'),
                                TextEntry::make('total_amount')->money('PHP'),
                                TextEntry::make('payment_method')->badge(),

                            ]),
                    ])->columnSpan(1),
                ]),
            ]);
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([]);
    }

    public static function getCustomerDetails()
    {
        return [];
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([

                Tables\Columns\TextColumn::make('order_id')
                    ->sortable(),
                Tables\Columns\TextColumn::make('order_items_count')
                    ->numeric()
                    ->label('Products')
                    ->counts('orderItems'),
                Tables\Columns\TextColumn::make('total_amount')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('shipping_fee')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->numeric()
                    ->sortable(),
                TextColumn::make('status')
                    ->badge(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable(),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
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
            // orderItemsRelationManager::class
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListOrders::route('/'),
            'create' => Pages\CreateOrder::route('/create'),
            'edit' => Pages\EditOrder::route('/{record}/edit'),
            'view' => Pages\ViewOrder::route('/{record}'),
        ];
    }
}
