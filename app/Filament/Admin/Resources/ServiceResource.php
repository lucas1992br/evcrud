<?php

namespace App\Filament\Admin\Resources;

use App\Enums\Enums;
use App\Filament\Admin\Resources\ServiceResource\Pages;
use App\Filament\Admin\Resources\ServiceResource\RelationManagers;
use App\Models\Service;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\TimePicker;
use Filament\Support\Enums\MaxWidth;
use Filament\Forms\Components\Textarea;
use Filament\Resources\Components\Tab;
use Filament\Tables\Filters\Filter;
use function Laravel\Prompts\select;


class ServiceResource extends Resource

{
    protected static ?string $model = Service::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $title = 'Atendimentos';

    protected static ?string $navigationLabel = 'Atendimentos';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('patient')
                    ->required()
                    ->maxLength(255),
                Forms\Components\DateTimePicker::make('date')
                    ->required(),
                Forms\Components\DateTimePicker::make('deliveryDate')
                    ->required(),

                Forms\Components\Select::make('maintenance_id')
                    ->relationship('maintenance', 'name')
                    ->searchable()
                    ->preload()
                    ->required(),
                Forms\Components\Select::make('equipament_id')
                    ->relationship('equipament', 'name')
                    ->required()
                    ->searchable()
                    ->preload(),
                Forms\Components\Select::make('doctor_id')
                    ->relationship('doctor', 'name')
                    ->required()
                    ->searchable()
                    ->preload(),
                Forms\Components\Select::make('procedure_id')
                    ->relationship('procedure', 'name')
                    ->required()
                    ->searchable()
                    ->preload(),
                Forms\Components\Select::make('technicals')
                    ->options(Enums::class)
                    ->searchable()
                    ->preload(),
                Forms\Components\Select::make('customer_id')
                    ->relationship('customer', 'name')
                    ->required()
                    ->searchable()
                    ->preload(),
                Forms\Components\Select::make('agreement_id')
                    ->relationship('agreement', 'name')
                    ->required()
                    ->searchable()
                    ->preload(),
                Forms\Components\Select::make('material_id')
                    ->relationship('material', 'name')
                    ->required()
                    ->searchable()
                    ->preload(),
                Textarea::make('comment')
                    ->required()
                    ->maxLength(255),
                Forms\Components\FileUpload::make('cost')
                    ->multiple()
                    ->directory('cost')
                    ->disk('public'),
                Forms\Components\FileUpload::make('delivery')
                    ->directory('delivery')
                    ->disk('public')
                    ->multiple(),
                Forms\Components\FileUpload::make('removal')
                    ->directory('removal')
                    ->disk('public')
                    ->multiple(),
                Forms\Components\FileUpload::make('cost')
                    ->multiple(),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table

            ->columns([
                Tables\Columns\TextColumn::make('equipament.name')
                    ->label('Equipamento'),

                Tables\Columns\TextColumn::make('date')
                    ->dateTime()
                    ->sortable()
                    ->label('Data'),

                Tables\Columns\TextColumn::make('technicals')
                    ->searchable()
                    ->badge('primary')
                    ->label('Técnico'),

                Tables\Columns\TextColumn::make('customer.name')
                    ->label('Hospital'),

                Tables\Columns\TextColumn::make('customer.city')
                    ->label('Cidade'),

                Tables\Columns\TextColumn::make('patient')
                    ->searchable()
                    ->label('Paciente'),

                Tables\Columns\TextColumn::make('doctor.name')
                    ->label('Médico'),

                Tables\Columns\TextColumn::make('agreement.name')
                    ->label('Convenio'),

                Tables\Columns\TextColumn::make('material.name')
                    ->label('Material'),

                Tables\Columns\TextColumn::make('procedure.name')
                    ->label('Procedimento'),

                Tables\Columns\TextColumn::make('maintenance.name')
                    ->label('CME'),

                Tables\Columns\TextColumn::make('comment')
                    ->label('Observações'),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('technicals')
                ->options(Enums::class),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),

            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListServices::route('/'),
            'create' => Pages\CreateService::route('/create'),
            'view' => Pages\ViewService::route('/{record}'),
            'edit' => Pages\EditService::route('/{record}/edit'),
        ];
    }
}
