<?php

namespace App\Filament\Customer\Resources;

use App\Filament\Customer\Resources\UserAddressResource\Pages;
use App\Filament\Customer\Resources\UserAddressResource\RelationManagers;
use App\Models\UserAddress;
use Filament\Forms;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class UserAddressResource extends Resource
{
    protected static ?string $model = UserAddress::class;

    protected static ?string $navigationIcon = 'heroicon-o-map';

    protected static ?string $navigationLabel = 'Address Book';

    protected static ?string $label = "Address";

    protected function getRedirectUrl(): string
    {
        return  $this->getResource()::getUrl('index');
    }

    public static function getBarangayOptions()
    { 
        return \DB::table('barangays')
        ->where('city_id', 137401)
        ->pluck('name');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make([
                    Toggle::make('isDefault'),
                    TextInput::make('title')->required(),
                    TextInput::make('name'),
                    Grid::make(2)->schema([
                        TextInput::make('contact_no'),
                        TextInput::make('email'),
                    ]),
                    Grid::make(2)->schema([
                        TextInput::make('region')->readOnly()->default('National Capital Region (NCR)'),
                        TextInput::make('province')->readOnly()->default('NCR, Second District (Not a Province)'),

                    ]),
                    TextInput::make('city')->readOnly()->default('City of Mandaluyong)'),
                    Select::make('barangay')->options(self::getBarangayOptions()),
                    TextInput::make('street'),
                    TextInput::make('address_line'),
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                ToggleColumn::make('isDefault'),
                TextColumn::make('title'),
                TextColumn::make('name'),
                TextColumn::make('contact_no'),
                TextColumn::make('email'),
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
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListUserAddresses::route('/'),
            'create' => Pages\CreateUserAddress::route('/create'),
            'edit' => Pages\EditUserAddress::route('/{record}/edit'),
        ];
    }
}
