<?php

namespace App\Filament\Resources\PejabatStrukturalResource\Pages;

use App\Filament\Resources\PejabatStrukturalResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPejabatStruktural extends ListRecords
{
    protected static string $resource = PejabatStrukturalResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->label('Tambah Pejabat'),
        ];
    }
}

