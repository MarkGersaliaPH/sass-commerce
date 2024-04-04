<?php

namespace App\Filament\Store\Resources;

use App\Enums\OrderStatus;
use App\Filament\Store\Resources\OrderResource\Pages;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Filament\Facades\Filament;
use Filament\Forms;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\ToggleButtons;
use Filament\Forms\Components\Wizard;
use Filament\Forms\Form;
use Filament\Forms\Set;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\HtmlString;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Placeholder;
use Filament\Infolists\Components\Actions\Action;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Infolist;
use Filament\Tables\Columns\ImageColumn;

class OrderResource extends Resource
{
    protected static ?string $model = Order::class;
    protected static bool $canCreate = false;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $recordTitleAttribute = 'order_id';

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::whereStoreId(Filament::getTenant())->count();
    }
    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                TextEntry::make('name'),
                TextEntry::make('email'),
                TextEntry::make('notes')
                    ->columnSpanFull(),
                    Action::make('resetStars')
                    ->icon('heroicon-m-x-mark')
                    ->color('danger')
                    ->requiresConfirmation()
                    // ->action(function (ResetStars $resetStars) {
                    //     $resetStars();
                    // })
                            
                    ]);
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                Section::make([
                    ToggleButtons::make('status')
                        ->inline()
                        ->options(OrderStatus::class)
                        ->required(),
                ]),
                Grid::make(3)->schema([
                    Grid::make()->schema([
                        // Section::make()->schema([
                        //     Forms\Components\Select::make('user_id')
                        //         ->relationship(name: 'user', titleAttribute: 'name', ignoreRecord: true, modifyQueryUsing: fn (Builder $query) => $query->where('type', 3),)
                        //         ->searchable(),
                        // ]),
                        Section::make('Shipping Details')
                            ->schema(
                                [
                                    Grid::make(3)
                                        ->schema([
                                            Placeholder::make('Name')
                                                ->content(fn (Order $record): string => $record->guestCustomer->name ?? ""),
                                            Placeholder::make('Contact no')
                                                ->content(fn (Order $record): string => $record->guestCustomer->contact_no ?? ""),
                                            Placeholder::make('Email')
                                                ->content(fn (Order $record): string => $record->guestCustomer->email ?? ""),

                                        ]),
                                    Placeholder::make('Address')
                                        ->content(fn (Order $record): string => $record->displayAddress() ?? "")
                                        ->columnSpan('full'),


                                ]
                            ),
                        Section::make()->schema([
                            Repeater::make('orderItems')
                                ->label("Items")
                                ->disabled()
                                ->relationship('orderItems')
                                ->schema([
                                    // ...
                                    Grid::make(3)->schema([
                                        Select::make('product_id')
                                            ->label('Product')
                                            ->options(Product::query()->pluck('name', 'id'))
                                            ->required()
                                            ->reactive()
                                            ->distinct()
                                            ->disableOptionsWhenSelectedInSiblingRepeaterItems()

                                            ->searchable(),

                                        TextInput::make('qty')
                                            ->label('Quantity')
                                            ->numeric()
                                            ->default(1)
                                            ->required(),

                                        TextInput::make('unit_price')
                                            ->label('Unit Price')
                                            ->disabled()
                                            ->dehydrated()
                                            ->numeric()
                                            ->required()
                                    ])
                                ])
                        ]),

                    ])->columnSpan(2),
                    Grid::make()->schema([
                        Section::make()
                            ->schema([
                                Placeholder::make('Ordered At')
                                    ->content(fn (Order $record): string => $record->created_at->format('F d,Y h:m A ') . "({$record->created_at->diffForHumans()})")
                            ]),
                            
                        Section::make('Billing')
                        ->disabled()
                        ->schema([
                            TextInput::make('total_amount')->numeric()->required(),

                            TextInput::make('shipping_fee')->numeric(),
                            TextInput::make('tax')->numeric(),
                            TextInput::make('total_amount')->numeric()->required(),
                            Select::make('payment_method')
                                ->options(['1' => "Cash on Delivery", "2" => "Gcash"])

                        ]),
                    ])->columnSpan(1)
                ])

            ]);
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
                    ->label("Products")
                    ->counts('orderItems'),
                Tables\Columns\TextColumn::make('total_amount')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('shipping_fee')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('status')
                    ->badge(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
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
            // orderItemsRelationManager::class
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListOrders::route('/'),
            'create' => Pages\CreateOrder::route('/create'),
            'edit' => Pages\EditOrder::route('/{record}/edit'),
        ];
    }
}
