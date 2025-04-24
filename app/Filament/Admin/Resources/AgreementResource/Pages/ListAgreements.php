<?php

namespace App\Filament\Admin\Resources\AgreementResource\Pages;

use App\Filament\Admin\Resources\AgreementResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAgreements extends ListRecords
{
    protected static string $resource = AgreementResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
