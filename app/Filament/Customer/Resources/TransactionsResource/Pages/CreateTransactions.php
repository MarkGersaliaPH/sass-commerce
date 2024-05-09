<?php

namespace App\Filament\Customer\Resources\TransactionsResource\Pages;

use App\Filament\Customer\Resources\TransactionsResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateTransactions extends CreateRecord
{
    protected static string $resource = TransactionsResource::class;
}
