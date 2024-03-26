<?php

namespace App\Filament\Store\Resources\OrderResource\Pages;

use App\Filament\Store\Resources\OrderResource;
use App\Models\Category;
use App\Models\Product;
use Filament\Actions;
use Filament\Facades\Filament;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\ToggleButtons;
use Filament\Forms\Components\Wizard;
use Filament\Forms\Components\Wizard\Step;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Contracts\Database\Eloquent\Builder;

class CreateOrder extends CreateRecord
{
    use CreateRecord\Concerns\HasWizard;

    protected static string $resource = OrderResource::class;

    protected function getSteps(): array
    {

        $products = Product::get();

        return [
            Step::make('Details')
                ->schema([

                    ToggleButtons::make('status')
                        ->inline()
                        ->default(1)
                        ->options(['1' => 'Pending', '2' => 'Processing', '3' => 'Shipped', '4' => 'Delivered', '5' => 'Cancelled'])
                        ->required(),
                    Select::make('user_id')
                        ->relationship('user', 'name'),
                    TextArea::make('notes'),
                ]),
            Step::make('Items')
                ->schema([

                    Repeater::make('orderItems')
                        ->relationship('orderItems')
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
                                    ->columnSpan([
                                        'md' => 5,
                                    ])
                                    ->searchable(),

                                TextInput::make('qty')
                                    ->label('Quantity')
                                    ->numeric()
                                    ->default(1)
                                    ->columnSpan([
                                        'md' => 2,
                                    ])
                                    ->required(),

                                TextInput::make('unit_price')
                                    ->label('Unit Price')
                                    ->disabled()
                                    ->dehydrated()
                                    ->numeric()
                                    ->required()
                                    ->columnSpan([
                                        'md' => 3,
                                    ]),
                            ])
                        ])

                ]),
            Step::make('Billing')
                ->schema([
                    TextInput::make('total_amount')->numeric()->required(),
                    TextInput::make('shipping_fee')->numeric()->required(),

                    Section::make('Shipping Details')
                    ->schema(
                        [
                            Grid::make()
                                ->relationship('address')
                                ->schema(
                                    OrderResource::getAddressForm(),
                                )
                        ]
                    ),
                    Select::make('payment_method')
                        ->options(['1' => "Cash on Delivery", "2" => "Gcash"])
                ]),
        ];
    }

    // protected function mutateFormDataBeforeCreate(array $data): array
    // {
    //     dd($data);
    //     $data['user_id'] = auth()->id();

    //     return $data;
    // }
}
