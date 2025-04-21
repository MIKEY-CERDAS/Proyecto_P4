<?php

namespace App\Filament\Resources\MaterialesResource\Pages;

use App\Filament\Resources\MaterialesResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use App\Http\Controllers\MaterialesController;
use Illuminate\Database\Eloquent\Model;

class EditMateriales extends EditRecord
{
    protected static string $resource = MaterialesResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make()->action(function ($record) {
                $controller = new MaterialesController();

                $controller->eliminarMaterial($record->id);

                return redirect()->route('filament.admin.resources.materiales.index');
            })
        ];
    }

    protected function handleRecordUpdate(Model $record, array $data): Model{
        $controller = new MaterialesController();
        
        return $controller->actualizarMaterial($data, $record->id);
    }

    protected function getRedirectUrl(): string{
        return $this->getResource()::getUrl('index');
    }
}
