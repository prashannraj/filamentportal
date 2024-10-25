<?php

namespace App\Filament\Resources\CompanyAdvisorResource\Pages;

use App\Filament\Resources\CompanyAdvisorResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCompanyAdvisor extends EditRecord
{
    protected static string $resource = CompanyAdvisorResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
