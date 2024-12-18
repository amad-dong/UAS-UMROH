<?php

namespace App\Filament\Resources\KepulanganUmrohResource\Pages;

use App\Filament\Resources\KepulanganUmrohResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListKepulanganUmrohs extends ListRecords
{
    protected static string $resource = KepulanganUmrohResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
