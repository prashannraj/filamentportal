<?php

namespace App\Filament\Resources\GeneralFormResource\Pages;

use App\Filament\Resources\GeneralFormResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListGeneralForms extends ListRecords
{
    protected static string $resource = GeneralFormResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
