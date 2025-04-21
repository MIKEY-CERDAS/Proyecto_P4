<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Materiales;

class MaterialesController extends Controller
{
    public function guardarMaterial(array $data){
        return Materiales::create([
            'nombre'=>$data['nombre'],
            'descripcion'=>$data['descripcion'],
            'cantidad'=>$data['cantidad'],
            'precio'=>$data['precio']
        ]);
    }

    public function actualizarMaterial(array $data, $id){
        $material = Materiales::find($id);

        $material->update([
            'nombre'=>$data['nombre'],
            'descripcion'=>$data['descripcion'],
            'cantidad'=>$data['cantidad'],
            'precio'=>$data['precio'],
        ]);

        return $material;
    }

    public function eliminarMaterial($id){
        $material = Materiales::find($id);

        $material->delete();
    }
}