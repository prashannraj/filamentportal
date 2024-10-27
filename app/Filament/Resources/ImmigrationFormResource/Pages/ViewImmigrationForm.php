<?php

namespace App\Filament\Resources\ImmigrationFormResource\Pages;

use App\Filament\Resources\ImmigrationFormResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewImmigrationForm extends ViewRecord
{
    protected static string $resource = ImmigrationFormResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
