<?php
namespace App\Traits;
use Filament\Resources\Components\Tab;
use Illuminate\Database\Eloquent\Builder;
trait HasServiceTabs{
    public function getTabs(): array
    {
        return [
            'Todos Agendamentos' => Tab::make(),
            'Agendamentos do Dia' => Tab::make()
                ->modifyQueryUsing(fn (Builder $query) => $query->whereDay('date', '=', date('d'))),
            'Entregas do Dia' => Tab::make()
                ->modifyQueryUsing(fn (Builder $query) => $query->whereDay('deliveryDate', '=', date('d'))),
        ];
    }
}

