<?php

namespace App\Filament\Resources\CompanyBanchResource\Pages;

use App\Filament\Resources\CompanyBanchResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCompanyBanches extends ListRecords
{
    protected static string $resource = CompanyBanchResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
