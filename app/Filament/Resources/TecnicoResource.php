<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TecnicoResource\Pages;
use App\Filament\Resources\TecnicoResource\RelationManagers;
use App\Models\Tecnico;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TecnicoResource extends Resource
{
    protected static ?string $model = Tecnico::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('N°_documento')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('Nombres')
                    ->required()
                    ->maxLength(191),
                Forms\Components\TextInput::make('Apellidos')
                    ->required()
                    ->maxLength(191),
                Forms\Components\Select::make('Codigo_tipo_documento')
                    ->relationship('documentos','Nombre_tipo_documento')
                    ->required()
                    ->searchable()
                    ->preload(),
                Forms\Components\TextInput::make('Telefono')
                    ->required()
                    ->maxLength(191),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('N°_documento')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('Nombres')
                    ->searchable(),
                Tables\Columns\TextColumn::make('Apellidos')
                    ->searchable(),
                Tables\Columns\TextColumn::make('documentos.Nombre_tipo_documento')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('Telefono')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
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
            'index' => Pages\ListTecnicos::route('/'),
            'create' => Pages\CreateTecnico::route('/create'),
            'edit' => Pages\EditTecnico::route('/{record}/edit'),
        ];
    }    
}
