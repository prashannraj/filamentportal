<?php

namespace App\Filament\Resources\ImmigrationFormResource\Pages;

use App\Filament\Resources\ImmigrationFormResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditImmigrationForm extends EditRecord
{
    protected static string $resource = ImmigrationFormResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
