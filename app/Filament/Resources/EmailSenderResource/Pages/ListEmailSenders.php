<?php

namespace App\Filament\Resources\EmailSenderResource\Pages;

use App\Filament\Resources\EmailSenderResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListEmailSenders extends ListRecords
{
    protected static string $resource = EmailSenderResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
