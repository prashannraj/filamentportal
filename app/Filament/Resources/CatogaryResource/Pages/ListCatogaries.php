<?php

namespace App\Filament\Resources\CatogaryResource\Pages;

use App\Filament\Resources\CatogaryResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCatogaries extends ListRecords
{
    protected static string $resource = CatogaryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
