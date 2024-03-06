<?php

namespace App\Filament\Store\Resources;

use App\Filament\Store\Resources\OrderResource\Pages;
use App\Filament\Store\Resources\OrderResource\RelationManagers;
use App\Filament\Store\Resources\OrderResource\RelationManagers\OrderItemsRelationManager;
use App\Models\Order;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Wizard;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\HtmlString;

class OrderResource extends Resource
{
    protected static ?string $model = Order::class;
    protected static bool $canCreate = false;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                
                // Section::make()->schema([
                //     Forms\Components\Select::make('user_id')
                //     ->relationship(name: 'user', titleAttribute: 'name', ignoreRecord: true, modifyQueryUsing: fn (Builder $query) => $query->where('type',3),)
     
                //     ->searchable()  , 
                //     Forms\Components\TextInput::make('total_amount')
                //         ->required()
                //         ->numeric(),
                //     Forms\Components\TextInput::make('shipping_fee')
                //         ->required()
                //         ->numeric(),
                         
                //         Select::make('status')
                //         ->default(1)
                //         ->options(['1'=>'Pending','2'=>'Confirmed','3'=>'For Delivery','4'=>'Rejected','5'=>'Cancelled'])
                // ])
                
            ]);
    }

    

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user.name')
                    ->numeric()
                    ->sortable(), 
                    Tables\Columns\TextColumn::make('product')
                        ->numeric()
                        ->sortable(), 
                Tables\Columns\TextColumn::make('total_amount')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('shipping_fee')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('status')
                    ->numeric()
                    ->sortable(),
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
            OrderItemsRelationManager::class
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
