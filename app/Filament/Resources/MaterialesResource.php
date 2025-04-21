<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MaterialesResource\Pages;
use App\Filament\Resources\MaterialesResource\RelationManagers;
use App\Models\Materiales;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Actions\Action;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\TextColumn;
use App\Http\Controllers\MaterialesController;

class MaterialesResource extends Resource
{
    protected static ?string $model = Materiales::class;

    protected static ?string $navigationIcon = 'heroicon-o-squares-2x2';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('nombre')->required()->minLength(1)->label('Nombre del material'),
                TextInput::make('cantidad')->required()->numeric()->integer()->minValue(1)->label('Cantidad disponible'),
                Textarea::make('descripcion')->required()->minLength(1)->label('Descripción del material'),               
                TextInput::make('precio')->required()->numeric()->minValue(1)->label('Precio por unidad')->prefix('₡')
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nombre'),
                TextColumn::make('descripcion')->label('Descripción'),
                TextColumn::make('cantidad')->label('Cantidad disponible'),
                TextColumn::make('precio')->label('Precio por unidad')->money('crc', true)
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Action::make('agregarAlCarrito')->label('Agregar al carrito')->icon('heroicon-m-plus')->color('success')->url(fn($record)=>route('filament.admin.resources.carritos.create', ['material'=>$record->id]))->openUrlInNewTab(false),
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
            'index' => Pages\ListMateriales::route('/'),
            'create' => Pages\CreateMateriales::route('/create'),
            'edit' => Pages\EditMateriales::route('/{record}/edit'),
        ];
    }
}
