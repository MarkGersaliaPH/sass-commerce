<?php

namespace App\Filament\Store\Resources\OrderResource\RelationManagers;

use Filament\Facades\Filament;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class OrderItemsRelationManager extends RelationManager
{
    protected static string $relationship = 'orderItems';

    public function form(Form $form): Form
    {
        return $form
            ->schema([ 
                Forms\Components\Select::make('product')
                ->relationship(name: 'product', titleAttribute: 'name', ignoreRecord: true, modifyQueryUsing: fn (Builder $query) => $query->where('store_id',Filament::getTenant()->id),),
                
                TextInput::make('total')->numeric()->required(),
                TextInput::make('description')->required(),
                TextInput::make('quantity')->numeric()->required(),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('name')
            ->columns([
                Tables\Columns\ImageColumn::make('product.images')->circular()->stacked(),
                Tables\Columns\TextColumn::make('product.name'),
                Tables\Columns\TextColumn::make('status'),
                Tables\Columns\TextColumn::make('total_amount'),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make()
                ->mutateFormDataUsing(function (array $data): array {
                    
                    $data['product_id'] = $data['product'];
             
                    return $data;
                }),
                
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
