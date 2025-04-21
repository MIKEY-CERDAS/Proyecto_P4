<?php

namespace App\Filament\Resources\PedidosResource\Pages;

use App\Filament\Resources\PedidosResource;
use Filament\Resources\Pages\Page;
use App\Models\Pedidos;
use App\Models\DetallePedidos;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Placeholder;
use Filament\Tables\Table;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Columns\TextColumn;

class VerDetallesPedido extends Page implements HasTable
{
    use InteractsWithTable;

    public ?Pedidos $pedido = null;

    protected static string $resource = PedidosResource::class;

    protected static string $view = 'filament.resources.pedidos-resource.pages.ver-detalles-pedido';

    public function mount($record): void
    {
        $this->pedido = Pedidos::findOrFail($record);
    }

    protected function getTableQuery()
    {
        return DetallePedidos::with('materiales')
            ->where('pedidoId', $this->pedido->id);
    }

    protected function getTableColumns(): array
    {
        return [
            TextColumn::make('materiales.nombre')->label('Material'),
            TextColumn::make('cantidad')->label('Cantidad'),
            TextColumn::make('total')->label('Subtotal')->money('crc', true),
        ];
    }
}
