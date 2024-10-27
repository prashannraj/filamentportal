<?php

namespace App\Filament\Resources\ImmigrationFormResource\Pages;

use App\Filament\Resources\ImmigrationFormResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListImmigrationForms extends ListRecords
{
    protected static string $resource = ImmigrationFormResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
