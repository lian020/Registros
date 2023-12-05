<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RegistroResource\Pages;
use App\Filament\Resources\RegistroResource\RelationManagers;
use App\Models\Registro;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class RegistroResource extends Resource
{
    protected static ?string $model = Registro::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('codigo_tecnico')
                ->relationship('tecnicos','Nombres')
                ->required()
                ->searchable()
                ->preload(),
                Forms\Components\Select::make('codigo_equipo')
                    ->relationship('equipos','Nombre_tipo_equipo')
                    ->required()
                    ->searchable()
                    ->preload(),
                Forms\Components\Select::make('codigo_instituto')
                    ->relationship('institutos','Nombre_institucion_educativa')
                    ->required()
                    ->searchable()
                    ->preload(),
                Forms\Components\Select::make('codigo_marca')
                    ->relationship('marcas','Nombre_tipo_equipo')
                    ->required()
                    ->searchable()
                    ->preload(),
                Forms\Components\Select::make('codigo_estado')
                    ->relationship('estados','Nombre_estado')
                    ->required()
                    ->searchable()
                    ->preload(),
                Forms\Components\DatePicker::make('fecha_registro')
                    ->required(),
                Forms\Components\TextInput::make('modelo_registro')
                    ->maxLength(191),
                Forms\Components\TextInput::make('serial_registro')
                    ->required()
                    ->maxLength(191),
                Forms\Components\TextInput::make('n°_inventario')
                    ->required()
                    ->maxLength(191),
                Forms\Components\TextInput::make('ubicacion_registro')
                    ->required()
                    ->maxLength(191),
                Forms\Components\TextInput::make('MAC_registro')
                    ->maxLength(191),
                Forms\Components\Toggle::make('tarjeta_red_registro'),
                Forms\Components\TextInput::make('monitor_marca')
                    ->maxLength(191),
                Forms\Components\TextInput::make('monitor_n°inventario')
                    ->maxLength(191),
                Forms\Components\TextInput::make('monitor_estado')
                    ->maxLength(191),
                Forms\Components\TextInput::make('mouse_marca')
                    ->maxLength(191),
                Forms\Components\TextInput::make('mouse_n°inventario')
                    ->maxLength(191),
                Forms\Components\TextInput::make('mouse_estado')
                    ->maxLength(191),
                Forms\Components\TextInput::make('teclado_marca')
                    ->maxLength(191),
                Forms\Components\TextInput::make('teclado_n°inventario')
                    ->maxLength(191),
                Forms\Components\TextInput::make('teclado_estado')
                    ->maxLength(191),
                Forms\Components\TextInput::make('cargador_marca')
                    ->maxLength(191),
                Forms\Components\TextInput::make('cargador_n°inventario')
                    ->maxLength(191),
                Forms\Components\TextInput::make('cargador_estado')
                    ->maxLength(191),
                Forms\Components\TextInput::make('sistema operativo')
                    ->maxLength(191),
                Forms\Components\TextInput::make('control_marca')
                    ->maxLength(191),
                Forms\Components\TextInput::make('control_n°inventario')
                    ->maxLength(191),
                Forms\Components\TextInput::make('n°parlantes')
                    ->maxLength(191),
                Forms\Components\Textarea::make('observaciones')
                    ->required()
                    ->maxLength(65535)
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('tecnicos.Nombres')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('equipos.Nombre_tipo_equipo')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('institutos.Nombre_institucion_educativa')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('marcas.Nombre_tipo_equipo')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('estados.Nombre_estado')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('fecha_registro')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('modelo_registro')
                    ->searchable(),
                Tables\Columns\TextColumn::make('serial_registro')
                    ->searchable(),
                Tables\Columns\TextColumn::make('n°_inventario')
                    ->searchable(),
                Tables\Columns\TextColumn::make('ubicacion_registro')
                    ->searchable(),
                Tables\Columns\TextColumn::make('MAC_registro')
                    ->searchable(),
                Tables\Columns\IconColumn::make('tarjeta_red_registro')
                    ->boolean(),
                Tables\Columns\TextColumn::make('monitor_marca')
                    ->searchable(),
                Tables\Columns\TextColumn::make('monitor_n°inventario')
                    ->searchable(),
                Tables\Columns\TextColumn::make('monitor_estado')
                    ->searchable(),
                Tables\Columns\TextColumn::make('mouse_marca')
                    ->searchable(),
                Tables\Columns\TextColumn::make('mouse_n°inventario')
                    ->searchable(),
                Tables\Columns\TextColumn::make('mouse_estado')
                    ->searchable(),
                Tables\Columns\TextColumn::make('teclado_marca')
                    ->searchable(),
                Tables\Columns\TextColumn::make('teclado_n°inventario')
                    ->searchable(),
                Tables\Columns\TextColumn::make('teclado_estado')
                    ->searchable(),
                Tables\Columns\TextColumn::make('cargador_marca')
                    ->searchable(),
                Tables\Columns\TextColumn::make('cargador_n°inventario')
                    ->searchable(),
                Tables\Columns\TextColumn::make('cargador_estado')
                    ->searchable(),
                Tables\Columns\TextColumn::make('sistema operativo')
                    ->searchable(),
                Tables\Columns\TextColumn::make('control_marca')
                    ->searchable(),
                Tables\Columns\TextColumn::make('control_n°inventario')
                    ->searchable(),
                Tables\Columns\TextColumn::make('n°parlantes')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                    Tables\Columns\TextColumn::make('observaciones')
                    ->searchable(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->emptyStateActions([
                Tables\Actions\CreateAction::make(),
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
            'index' => Pages\ListRegistros::route('/'),
            'create' => Pages\CreateRegistro::route('/create'),
            'edit' => Pages\EditRegistro::route('/{record}/edit'),
        ];
    }    
}
