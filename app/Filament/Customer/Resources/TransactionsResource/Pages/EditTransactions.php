<?php

namespace App\Filament\Customer\Resources\TransactionsResource\Pages;

use App\Filament\Customer\Resources\TransactionsResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTransactions extends EditRecord
{
    protected static string $resource = TransactionsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
