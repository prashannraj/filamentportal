<?php

namespace App\Filament\Resources\CatogaryResource\Pages;

use App\Filament\Resources\CatogaryResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewCatogary extends ViewRecord
{
    protected static string $resource = CatogaryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
