<?php

namespace App\Enums;

use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasLabel;

enum Enumstechnicals : string implements HasLabel, HasColor
{
    case EDER = 'EDER';
    case TAYNA = 'TAYNA';
    case ERIKA = 'ERIKA';
    case BONFIM = 'BONFIM';
    case ROBERTO = 'ROBERTO';
    case CANCELADO = 'CANCELADO';
    case BRUNA = 'BRUNA';

    public function getLabel(): ?string
    {
        return match ($this){
            self::EDER =>'EDER',
            self::TAYNA =>'TAYNA',
            self::ERIKA =>'ERIKA',
            self::BONFIM =>'BONFIM',
            self::ROBERTO =>'ROBERTO',
            self::CANCELADO =>'CANCELADO',
            self::BRUNA =>'BRUNA',
        };
    }
    public function getColor(): string|array|null
    {
        return match ($this){
            self::EDER =>'info',
            self::TAYNA =>'gray',
            self::ERIKA =>'primary',
            self::BONFIM =>'success',
            self::ROBERTO =>'gray',
            self::CANCELADO =>'danger',
            self::BRUNA =>'warning',
        };
    }
}
