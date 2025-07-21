<?php

namespace App\Filament\Admin\Resources\KlubResource\Pages;

use App\Filament\Admin\Resources\KlubResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditKlub extends EditRecord
{
    protected static string $resource = KlubResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
