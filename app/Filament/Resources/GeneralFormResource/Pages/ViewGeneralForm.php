<?php

namespace App\Filament\Resources\GeneralFormResource\Pages;

use App\Filament\Resources\GeneralFormResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewGeneralForm extends ViewRecord
{
    protected static string $resource = GeneralFormResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
