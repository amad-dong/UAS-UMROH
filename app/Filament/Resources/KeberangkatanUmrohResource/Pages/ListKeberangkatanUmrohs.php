<?php

namespace App\Filament\Resources\KeberangkatanUmrohResource\Pages;

use App\Filament\Resources\KeberangkatanUmrohResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListKeberangkatanUmrohs extends ListRecords
{
    protected static string $resource = KeberangkatanUmrohResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
