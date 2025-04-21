<?php

namespace App\Filament\Resources\CarritoResource\Pages;

use App\Filament\Resources\CarritoResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use App\Http\Controllers\CarritoController;
use Illuminate\Database\Eloquent\Model;
use Filament\Actions\Action;

class CreateCarrito extends CreateRecord
{
    protected static string $resource = CarritoResource::class;

    public function mount(): void{
        parent::mount();
    
        $materialId = request()->query('material');
    
        $this->form->fill([
            'materialId' => $materialId,
            'usuarioId'=> auth()->id()
        ]);
    }

    protected function handleRecordCreation(array $data): Model{
        $controller = new CarritoController();
        
        return $controller->guardarCarrito($data);
    }

    protected function getRedirectUrl(): string{
        return $this->getResource()::getUrl('index');
    }

    public function boot(): void{
        CreateRecord::disableCreateAnother();
    }
}
