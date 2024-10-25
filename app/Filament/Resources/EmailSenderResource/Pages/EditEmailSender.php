<?php

namespace App\Filament\Resources\EmailSenderResource\Pages;

use App\Filament\Resources\EmailSenderResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditEmailSender extends EditRecord
{
    protected static string $resource = EmailSenderResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
