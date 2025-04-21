<?php

namespace App\Filament\Resources\CarritoResource\Pages;

use App\Filament\Resources\CarritoResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Actions\Action;
use Illuminate\Database\Eloquent\Builder;

class ListCarritos extends ListRecords
{
    protected static string $resource = CarritoResource::class;

    protected static ?string $title = 'Carrito de compras';

    protected function getHeaderActions(): array{
        return [
            Actions\CreateAction::make(),
            Action::make('crearPedido')
            ->label('Crear Pedido')
            ->icon('heroicon-o-plus')
            ->url(fn () => route('filament.admin.resources.pedidos.create'))
            ->color('success')
        ];
    }

    protected function getTableQuery(): Builder{
        return parent::getTableQuery()->where('usuarioId', auth()->id());
    }
}
