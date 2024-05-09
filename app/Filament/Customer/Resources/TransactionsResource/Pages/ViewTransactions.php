<?php

namespace App\Filament\Customer\Resources\TransactionsResource\Pages;

use App\Filament\Customer\Resources\TransactionsResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewTransactions extends ViewRecord
{
    protected static string $resource = TransactionsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
