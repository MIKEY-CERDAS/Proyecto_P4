<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CarritoResource\Pages;
use App\Filament\Resources\CarritoResource\RelationManagers;
use App\Models\Carrito;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Http\Controllers\CarritoController;
use App\Models\Materiales;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;

class CarritoResource extends Resource
{
    protected static ?string $model = Carrito::class;

    protected static ?string $navigationIcon = 'heroicon-o-shopping-cart';

    protected static ?string $navigationLabel = 'Carrito';

    public static function form(Form $form): Form
    {   
        return $form
            ->schema([
                Select::make('materialId')->required()->relationship('materiales', 'nombre')->searchable()->preload()->disabled(request()->has('material'))->reactive()->afterStateUpdated(fn (callable $set) => $set('cantidad', 1)),                    
                TextInput::make('cantidad')->required()->numeric()->integer()->minValue(1)->reactive()->label('Cantidad a comprar')
                ->rule(function (callable $get) {
                    $materialId = $get('materialId');
                    if (!$materialId) return null;
                    
                    $material = Materiales::find($materialId);
                    return $material ? 'max:' . $material->cantidad : null;
                })
                ->afterStateUpdated(function (callable $set, callable $get) {
                    $materialId = $get('materialId');
                    $cantidad = $get('cantidad');
                    
                    if (!$materialId || !$cantidad) {
                        $set('total', 0);
                        return;
                    }
                    
                    $material = Materiales::find($materialId);
                    if (!$material) {
                        $set('total', 0);
                        return;
                    }
                    
                    $total = $material->precio * $cantidad;
                    $set('total', $total);
                }),                    
                TextInput::make('total')->numeric()->disabled()->default(0)->label('Total a pagar')->prefix('₡')
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('materiales.nombre'),
                TextColumn::make('cantidad'),
                TextColumn::make('total')->label('Precio total')->money('crc', true)
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
            'index' => Pages\ListCarritos::route('/'),
            'create' => Pages\CreateCarrito::route('/create'),
            'edit' => Pages\EditCarrito::route('/{record}/edit'),
        ];
    }

    public static function getModelLabel(): string{
        return "Item";
    }
}
