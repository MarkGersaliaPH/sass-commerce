<?php

namespace App\Filament\Customer\Resources\UserAddressResource\Pages;

use App\Filament\Customer\Resources\UserAddressResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditUserAddress extends EditRecord
{
    protected static string $resource = UserAddressResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
    
    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
