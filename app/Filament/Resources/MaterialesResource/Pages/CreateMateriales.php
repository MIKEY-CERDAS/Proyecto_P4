<?php

namespace App\Filament\Resources\MaterialesResource\Pages;

use App\Filament\Resources\MaterialesResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use App\Http\Controllers\MaterialesController;
use Illuminate\Database\Eloquent\Model;
use Filament\Actions\Action;

class CreateMateriales extends CreateRecord
{
    protected static string $resource = MaterialesResource::class;

    protected function handleRecordCreation(array $data): Model{
        $controller = new MaterialesController();
        
        return $controller->guardarMaterial($data);
    }

    protected function getRedirectUrl(): string{
        return $this->getResource()::getUrl('index');
    }

    public function boot(): void{
        CreateRecord::disableCreateAnother();
    }
}
