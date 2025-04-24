<?php

namespace App\Filament\Admin\Resources\EquipamentResource\Pages;

use App\Filament\Admin\Resources\EquipamentResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateEquipament extends CreateRecord
{
    protected static string $resource = EquipamentResource::class;
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
