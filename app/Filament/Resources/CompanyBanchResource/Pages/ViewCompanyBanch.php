<?php

namespace App\Filament\Resources\CompanyBanchResource\Pages;

use App\Filament\Resources\CompanyBanchResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewCompanyBanch extends ViewRecord
{
    protected static string $resource = CompanyBanchResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
