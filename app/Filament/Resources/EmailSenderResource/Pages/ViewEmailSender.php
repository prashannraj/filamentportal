<?php

namespace App\Filament\Resources\EmailSenderResource\Pages;

use App\Filament\Resources\EmailSenderResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewEmailSender extends ViewRecord
{
    protected static string $resource = EmailSenderResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
