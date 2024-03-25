<?php

namespace App\Filament\Store\Resources;

use App\Filament\Store\Resources\OrderResource\Pages; 
use App\Models\Order;
use App\Models\Product; 
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


class OrderResource extends Resource
{
    protected static ?string $model = Order::class;
    protected static bool $canCreate = false;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Grid::make(3)->schema([
                    Grid::make()->schema([
                        Section::make('Status')->schema([
                            ToggleButtons::make('status')
                                ->inline()
                                ->default(1)
                                ->options(['1' => 'Pending', '2' => 'Processing', '3' => 'Shipped', '4' => 'Delivered', '5' => 'Cancelled'])
                                ->required(),
                        ]),
                        Section::make()->schema([
                            Forms\Components\Select::make('user_id')
                                ->relationship(name: 'user', titleAttribute: 'name', ignoreRecord: true, modifyQueryUsing: fn (Builder $query) => $query->where('type', 3),)
                                ->searchable(),
                        ]),

                        Section::make('Shipping Details')
                            ->schema(
                                [
                                    Grid::make()
                                        ->relationship('address')
                                        ->schema(
                                            self::getAddressForm(),
                                        )
                                ]
                            ),
                        Section::make()->schema([
                            Repeater::make('order_items')
                                ->label("Items")
                                ->relationship('order_items')
                                ->schema([
                                    // ...
                                    Grid::make(3)->schema([
                                        Select::make('product_id')
                                            ->label('Product')
                                            ->options(Product::query()->pluck('name', 'id'))
                                            ->required()
                                            ->reactive()
                                            ->afterStateUpdated(fn ($state, Set $set) => $set('unit_price', Product::find($state)?->price ?? 0))
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
                        ])

                    ])->columnSpan(2),
                    Grid::make()->schema([ 
                        Section::make('Billing')
                            ->schema([
                                TextInput::make('shipping_fee')->numeric(),

                                TextInput::make('total_amount')->numeric()->required(),

                                Select::make('payment_method')
                                    ->options(['1' => "Cash on Delivery", "2" => "Gcash"])
    
                            ]),
                            Section::make()
                            ->schema([
                                Placeholder::make('Ordered At')
                                ->content(fn (Order $record): string => $record->created_at->format('F d,Y h:m A ') . "({$record->created_at->diffForHumans()})")
                            ])
                    ])->columnSpan(1)
                ])

            ]);
    }



    public static function getAddressForm()
    {
        return [
            TextInput::make('barangay')
                ->maxLength(255)
                ->columnSpan('full'),
            Grid::make(3)
                ->schema([
                    TextInput::make('city')
                        ->maxLength(255),
                    TextInput::make('state')
                        ->label('State / Province')
                        ->maxLength(255),
                    TextInput::make('zip')
                        ->label('Zip / Postal code')
                        ->maxLength(255),
                ]),
            TextInput::make('street')
                ->label('Street address')
                ->maxLength(255)
                ->columnSpan('full'),
        ];
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('order_items_count')
                    ->numeric()
                    ->label("Products")
                    ->counts('order_items'),
                Tables\Columns\TextColumn::make('total_amount')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('shipping_fee')
                    ->numeric()
                    ->sortable(),

                TextColumn::make('status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        '1' => 'gray',
                        '2' => 'warning',
                        '3' => 'success',
                        '4' => 'danger',
                    }),
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
            // order_itemsRelationManager::class
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
