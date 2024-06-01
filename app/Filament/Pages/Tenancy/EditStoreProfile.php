<?php

namespace App\Filament\Pages\Tenancy;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Pages\Tenancy\EditTenantProfile;
use Filament\Tables\Columns\ToggleColumn;

class EditStoreProfile extends EditTenantProfile
{
    public static function getLabel(): string
    {
        return 'Store profile';
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make()->schema([
                    FileUpload::make('avatar')
                        ->avatar()
                        ->imageEditor()
                        ->directory('stores')
                        ->circleCropper(),
                        Toggle::make("is_open")->default(true),
                    TextInput::make('name')
                        ->required()
                        ->maxLength(255),
                    TextInput::make('contact_no')
                        ->maxLength(255),
                    TextInput::make('address')
                        ->maxLength(255),
                    TextInput::make('email')
                        ->email()
                        ->maxLength(255),
                ]),
                // ...
            ]);
    }
}
