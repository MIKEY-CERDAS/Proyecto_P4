<?php

namespace App\Filament\Resources\CarritoResource\Pages;

use App\Filament\Resources\CarritoResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use App\Http\Controllers\CarritoController;
use Illuminate\Database\Eloquent\Model;

class EditCarrito extends EditRecord
{
    protected static string $resource = CarritoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make()->action(function ($record) {
                $controller = new CarritoController();

                $controller->eliminarCarrito($record->id);

                return redirect()->route('filament.admin.resources.carritos.index');
            })
        ];
    }

    protected function handleRecordUpdate(Model $record, array $data): Model{
        $controller = new CarritoController();
        
        return $controller->actualizarCarrito($data, $record->id);
    }

    protected function getRedirectUrl(): string{
        return $this->getResource()::getUrl('index');
    }
}
