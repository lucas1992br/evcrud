<?php

namespace App\Filament\Admin\Resources\EquipamentResource\Pages;

use App\Filament\Admin\Resources\EquipamentResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditEquipament extends EditRecord
{
    protected static string $resource = EquipamentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
