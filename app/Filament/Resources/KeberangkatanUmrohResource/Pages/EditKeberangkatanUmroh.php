<?php

namespace App\Filament\Resources\KeberangkatanUmrohResource\Pages;

use App\Filament\Resources\KeberangkatanUmrohResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditKeberangkatanUmroh extends EditRecord
{
    protected static string $resource = KeberangkatanUmrohResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
