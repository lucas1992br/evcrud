<?php

namespace App\Filament\Admin\Resources\AgreementResource\Pages;

use App\Filament\Admin\Resources\AgreementResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateAgreement extends CreateRecord
{
    protected static string $resource = AgreementResource::class;
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
