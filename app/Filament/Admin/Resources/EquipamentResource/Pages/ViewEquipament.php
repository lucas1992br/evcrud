<?php

namespace App\Filament\Admin\Resources\EquipamentResource\Pages;

use App\Filament\Admin\Resources\EquipamentResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewEquipament extends ViewRecord
{
    protected static string $resource = EquipamentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
