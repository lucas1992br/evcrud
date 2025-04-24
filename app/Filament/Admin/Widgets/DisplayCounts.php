<?php

namespace App\Filament\Admin\Widgets;

use App\Models\Service;
use Filament\Support\Enums\IconPosition;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class DisplayCounts extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Atendimentos', Service::whereDay('date', '=', date('d'))->count())
            ->description('Atendimentos Hoje')
            ->descriptionIcon('heroicon-m-arrow-trending-up', IconPosition::Before)
            ->color('gray'),
            Stat::make('Entregas', Service::whereDay('deliveryDate', '=', date('d'))->count())
                ->description('Entregas Hoje')
                ->descriptionIcon('heroicon-m-arrow-trending-up', IconPosition::Before)
                ->color('primary'),
        ];
    }
}
