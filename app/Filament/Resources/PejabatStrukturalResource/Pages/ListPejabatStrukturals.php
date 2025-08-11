<?php

namespace App\Filament\Resources\PejabatStrukturalResource\Pages;

use App\Filament\Resources\PejabatStrukturalResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPejabatStrukturals extends ListRecords
{
    protected static string $resource = PejabatStrukturalResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}