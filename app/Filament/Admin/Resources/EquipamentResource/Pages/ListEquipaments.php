<?php

namespace App\Filament\Admin\Resources\EquipamentResource\Pages;

use App\Filament\Admin\Resources\EquipamentResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListEquipaments extends ListRecords
{
    protected static string $resource = EquipamentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
