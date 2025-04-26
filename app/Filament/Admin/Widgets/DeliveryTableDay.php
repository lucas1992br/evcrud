<?php

namespace App\Filament\Admin\Widgets;
use App\Enums\Enums;
use Filament\Support\Enums\MaxWidth;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class DeliveryTableDay extends BaseWidget
{
    protected int | string | array $columnSpan = 'full';

    public function table(Table $table): Table
    {
        return $table
            ->heading('Entregas')
            ->query(
                fn () => \App\Models\Service::whereDay('deliveryDate', '=', date('d'))
            )
            ->filters([
                Tables\Filters\SelectFilter::make('deliveryTechnicals')
                    ->options(Enums::class),
            ])
            ->columns([
                Tables\Columns\TextColumn::make('deliveryDate')
                    ->dateTime()
                    ->sortable()
                    ->label('Data'),
                Tables\Columns\TextColumn::make('deliveryTechnicals')
                    ->searchable()
                    ->badge()
                    ->label('Técnico'),
                Tables\Columns\TextColumn::make('equipament.name')
                    ->label('Equipamento'),
                Tables\Columns\TextColumn::make('customer.city')
                    ->label('Cidade'),
                Tables\Columns\TextColumn::make('procedure.name')
                    ->label('Procedimento'),
                Tables\Columns\TextColumn::make('customer.name')
                    ->label('Hospital'),
            ]);
    }
}
