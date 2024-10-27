<?php

namespace App\Filament\Resources\GeneralFormResource\Pages;

use App\Filament\Resources\GeneralFormResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditGeneralForm extends EditRecord
{
    protected static string $resource = GeneralFormResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
