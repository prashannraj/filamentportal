<?php

namespace App\Filament\Resources\CompanyBanchResource\Pages;

use App\Filament\Resources\CompanyBanchResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCompanyBanch extends EditRecord
{
    protected static string $resource = CompanyBanchResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
