<?php

namespace App\Filament\Customer\Resources\UserAddressResource\Pages;

use App\Filament\Customer\Resources\UserAddressResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateUserAddress extends CreateRecord
{
    protected static string $resource = UserAddressResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['user_id'] = auth()->id();
        
        return $data;
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
