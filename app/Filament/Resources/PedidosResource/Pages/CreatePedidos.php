<?php

namespace App\Filament\Resources\PedidosResource\Pages;

use App\Filament\Resources\PedidosResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use App\Models\Carrito;
use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\PedidosController;
use Filament\Notifications\Notification;

class CreatePedidos extends CreateRecord
{
    protected static string $resource = PedidosResource::class;

    protected function handleRecordCreation(array $data): Model{
        $controller = new PedidosController();

        $items = Carrito::where('usuarioId', auth()->id())->get();

        if ($items->isEmpty()) {
            Notification::make()->title('El carrito está vacío')->danger()->send();
            $this->halt(); 
        }
        
        return $controller->guardarPedido($data);
    }

    protected function getRedirectUrl(): string{
        return $this->getResource()::getUrl('index');
    }

    public function boot(): void{
        CreateRecord::disableCreateAnother();
    }

    public static function getCarritoItems()
    {
        return Carrito::with('materiales')->where('usuarioId', auth()->id())->get();
    }

    public static function calcularTotalCarrito()
    {
        return Carrito::where('usuarioId', auth()->id())->sum('total');
    }
}
