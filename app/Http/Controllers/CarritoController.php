<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Carrito;
use App\Models\Materiales;

class CarritoController extends Controller
{
    public function guardarCarrito(array $data){
        $material = Materiales::find($data['materialId']);

        $carritoExistente = Carrito::where('materialId', $material->id)->where('usuarioId', auth()->id())->first();

        if ($carritoExistente) {
            $nuevaCantidad = $carritoExistente->cantidad + $data['cantidad'];
            $nuevoTotal = $material->precio * $nuevaCantidad;

            $carritoExistente->update([
                'cantidad'=>$nuevaCantidad,
                'total'=>$nuevoTotal,
            ]);

            return $carritoExistente;
        } else {
            return Carrito::create([
                'materialId' => $data['materialId'],
                'usuarioId' => auth()->id(),
                'cantidad' => $data['cantidad'],
                'total' => $material->precio * $data['cantidad'],
            ]);
        }
    }

    public function actualizarCarrito(array $data, $id){
        $carrito = Carrito::find($id);

        $material = Materiales::find($data['materialId']);
        $nuevoTotal = $material->precio * $data['cantidad'];

        $carrito->update([
            'cantidad'=>$data['cantidad'],
            'total'=>$nuevoTotal
        ]);

        return $carrito;
    }

    public function eliminarCarrito($id){
        $carrito = Carrito::find($id);

        $carrito->delete();
    }

    public function calcularTotal($materialId, $cantidad){
        $material = Materiales::find($materialId);

        if ($material && $cantidad) {
            return $material->precio * $cantidad;
        }

        return 0;
    }

}
