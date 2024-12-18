<?php

namespace App\Filament\Resources\KepulanganUmrohResource\Pages;

use App\Filament\Resources\KepulanganUmrohResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditKepulanganUmroh extends EditRecord
{
    protected static string $resource = KepulanganUmrohResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
