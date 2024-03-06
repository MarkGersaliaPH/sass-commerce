<?php

namespace App\Filament\Store\Resources\CategoryResource\Pages;

use App\Filament\Store\Resources\CategoryResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateCategory extends CreateRecord
{
    protected static string $resource = CategoryResource::class;
}
