<?php

namespace App\Filament\Admin\Resources\MaintenanceResource\Pages;

use App\Filament\Admin\Resources\MaintenanceResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMaintenances extends ListRecords
{
    protected static string $resource = MaintenanceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
