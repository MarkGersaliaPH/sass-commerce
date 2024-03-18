<?php

namespace App\Filament\Resources;

use App\Models\Category;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;

class ProductUtility
{
    public static function getTable()
    {

        return [
            ImageColumn::make('images')->stacked()->circular(),
            TextColumn::make('name')->searchable(),
            ToggleColumn::make('is_enabled')->searchable(),
            TextColumn::make('category.name')->searchable(),
            TextColumn::make('price')
                ->money('PHP')
                ->sortable(),
            TextColumn::make('promo_price')
                ->money('PHP')
                ->sortable(),
        ];
    }
    public static function getForm()
    {
        return [Grid::make(3)->schema([
            Grid::make()->schema([
                Section::make('Details')
                    ->schema([
                        // ... 
                        TextInput::make('name')->required(),
                        Grid::make(2)->schema([

                            Select::make('category_id')
                            ->label('Category')
                            ->required()
                            ->relationship(name: 'category', titleAttribute: 'name')
                            ->preload() 
                            ->searchable()
                            ->createOptionForm([
                               TextInput::make('name')
                                    ->required() ,
                            ]),

                            
                            TextInput::make('preparation_time') 
                            ->numeric()
                            ->suffix('minutes')


                        ]),
                        RichEditor::make('description')
                    ]),

                Section::make('Pricing')
                    ->schema([
                        // ...
                        Grid::make(2)
                            ->schema([
                                TextInput::make('price')->numeric()
                                    ->prefix('PHP')
                                    ->required()
                                    ->maxValue(42949672.95),
                                TextInput::make('promo_price')->numeric()
                                    ->prefix('PHP')
                                    ->maxValue(42949672.95),
                            ])
                    ]),
            ])->columnSpan(2),
            Grid::make()->schema([

                Section::make('Product Status')
                    ->description('Disabling this settings will hide the product from the website')
                    ->schema([
                        Toggle::make('is_enabled')->label('Enabled')
                    ]),
                Section::make('Image List')
                    ->schema([
                        FileUpload::make('images')
                            ->label("")
                            ->directory("products")
                            ->maxFiles(5)
                            ->multiple(true)
                            ->imageEditor()
                            ->columnSpanFull()
                    ])
            ])->columnSpan(1),

        ])->columnSpanFull()];
    }
}
