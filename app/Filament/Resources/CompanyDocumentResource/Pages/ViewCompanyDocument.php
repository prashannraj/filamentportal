<?php

namespace App\Filament\Resources\CompanyDocumentResource\Pages;

use App\Filament\Resources\CompanyDocumentResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewCompanyDocument extends ViewRecord
{
    protected static string $resource = CompanyDocumentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
