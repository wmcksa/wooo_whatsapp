<?php

namespace App\Filament\Resources\SubscripResource\Pages;

use App\Filament\Resources\SubscripResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewSubscrip extends ViewRecord
{
    protected static string $resource = SubscripResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
