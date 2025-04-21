<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PedidosResource\Pages;
use App\Filament\Resources\PedidosResource\RelationManagers;
use App\Models\Pedidos;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\PedidosResource\Pages\CreatePedidos;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Repeater;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\Placeholder;
use Filament\Tables\Columns\Layout\Panel;
use Filament\Tables\Actions\Action;
use App\Models\DetallePedidos;
use App\Filament\Resources\PedidosResource\Pages\VerDetallesPedido;

class PedidosResource extends Resource
{
    protected static ?string $model = Pedidos::class;

    protected static ?string $navigationIcon = 'heroicon-o-wallet';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('usuarioId')->label('Usuario')->default(auth()->user()->email)->disabled(),
                TextInput::make('total')->numeric()->default(fn () => CreatePedidos::calcularTotalCarrito())->disabled()->label('Total a pagar')->prefix('₡'),
                Repeater::make('items')
                ->schema([
                    TextInput::make('materiales.nombre')->label('Material'),
                    TextInput::make('cantidad')->label('Cantidad'),
                    TextInput::make('total')->label('Precio')->prefix('₡')
                ])
                ->default(fn () => CreatePedidos::getCarritoItems()->toArray())->columns(4)->disabled()->label('Resumen del carrito')->columnSpanFull(),
                Placeholder::make('aviso:')->content('Tu carrito está vacío.')->visible(fn () => CreatePedidos::getCarritoItems()->isEmpty()),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('fecha')->label('Fecha de compra'),
                TextColumn::make('total')->label('Precio pagado')->money('crc', true)
            ])
            ->filters([
                //
            ])
            ->actions([
                Action::make('verDetalles')->label('Ver detalles')->icon('heroicon-m-eye')->url(fn ($record) => VerDetallesPedido::getUrl(['record' => $record->id]))->openUrlInNewTab(false)
            ])
            ->bulkActions([
            ])
            ->recordUrl(null);
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
            'index' => Pages\ListPedidos::route('/'),
            'create' => Pages\CreatePedidos::route('/create'),
            'edit' => Pages\EditPedidos::route('/{record}/edit'),
            'ver-detalles-pedido' => Pages\VerDetallesPedido::route('/{record}/ver'),
        ];
    }
}
