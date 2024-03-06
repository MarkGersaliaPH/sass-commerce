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
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Textarea;
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
            Step::make('Order')
                ->schema([

                    Repeater::make('orderItems')
                        ->relationship('orderItems')
                        ->schema([
                            // ...
                            Grid::make(3)->schema([

                                Select::make('product')
                                    // ->relationship(
                                    //     'product',
                                    //     'name',
                                    //     modifyQueryUsing: fn (Builder $query) =>  $query->where('store_id', Filament::getTenant()->id),
                                    // )
                                    ->options(
                                        $products->mapWithKeys(function (Product $product) {
                                            return [$product->id => sprintf('%s (PHP%s)', $product->name, $product->price)];
                                        })
                                    )
                                    // Disable options that are already selected in other rows
                                    ->disableOptionWhen(function ($value, $state, Get $get) {
                                        return collect($get('../*.product_id'))
                                            ->reject(fn ($id) => $id == $state)
                                            ->filter()
                                            ->contains($value);
                                    })

                                    // We need this field to trigger a livewire update on the change
                                    ->live()
                                    // ->afterStateUpdated(function ($state, Set $set, Get $get) {
                                    //     $product = Product::find($state);
                                    //     $total = $product->price * $get('quantity');
                                    //     if ($total) {
                                    //         $set('total', $total);
                                    //     }else{
                                    //         $set('total',$product->price);
                                    //     }
                                    // })
                                    // After adding a new row, we need to update the totals
                                    ->afterStateUpdated(function (Get $get, Set $set) {
                                        self::updateTotals($get, $set);
                                    }),
                                    
                                TextInput::make('quantity')
                                    ->numeric()
                                    ->default(1)
                                    ->minLength(1)
                                    ->readonly()
                                    ->live()
                                    ->afterStateUpdated(function ($state, Set $set, Get $get) {
                                        if ($get('quantity')) {
                                            $set('total', $get('total') * $state);
                                        } else {
                                            $set('total', $get('total'));
                                        }
                                    }),
                                TextInput::make('total')->readonly()->numeric()
                            ])
                        ])

                ]),
            Step::make('Delivery')
                ->schema([
                    Select::make('user_id')
                        ->relationship('user', 'name'),
                    Grid::make(2)->schema([
                        TextInput::make('contact_no')->tel()->required(),
                        TextInput::make('contact_name')->required(),
                    ]),
                    TextArea::make('shipping_address')->required(),
                ]),
            Step::make('Billing')
                ->schema([
                    Select::make('payment_method')
                        ->options(['1' => "Cash on Delivery", "2" => "Gcash"])
                ]),
        ];
    }
}
