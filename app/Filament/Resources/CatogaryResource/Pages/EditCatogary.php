<?php

namespace App\Filament\Resources\CatogaryResource\Pages;

use App\Filament\Resources\CatogaryResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCatogary extends EditRecord
{
    protected static string $resource = CatogaryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
