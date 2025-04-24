<?php

namespace App\Filament\Admin\Widgets;

use App\Enums\Enums;
use App\Models\Service;
use Filament\Support\Enums\MaxWidth;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;
use Illuminate\Support\Facades\DB;

class ServiceTableDay extends BaseWidget
{
    protected int | string | array $columnSpan = 'full';

    public function table(Table $table): Table
    {
        return $table
            ->heading('Atendimentos')
            ->query(
               fn () => \App\Models\Service::whereDay('date', '=', date('d'))
            )
            ->filters([
                Tables\Filters\SelectFilter::make('technicals')
                    ->options(Enums::class),
            ])
            ->columns([
                Tables\Columns\TextColumn::make('date')
                    ->date()
                    ->sortable()
                    ->label('Data'),
                Tables\Columns\TextColumn::make('time')
                    ->sortable()
                    ->label('Horario'),
                Tables\Columns\TextColumn::make('equipament.name')
                    ->label('Equipamento'),
                Tables\Columns\TextColumn::make('customer.city')
                    ->label('Cidade'),
                Tables\Columns\TextColumn::make('procedure.name')
                    ->label('Procedimento'),
                Tables\Columns\TextColumn::make('user.name')
                    ->searchable()
                    ->sortable()
                    ->label('Técnico'),
                Tables\Columns\TextColumn::make('customer.name')
                    ->label('Hospital'),

            ]);

    }

}
