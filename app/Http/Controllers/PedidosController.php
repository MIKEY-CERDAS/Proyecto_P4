<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Carrito;
use App\Models\Pedidos;
use App\Models\DetallePedidos;
use App\Models\Materiales;

class PedidosController extends Controller
{
    public function guardarPedido(array $data){
        $usuarioId = auth()->id();
        $carritoItems = Carrito::where('usuarioId', $usuarioId)->get();
        
        $pedido = Pedidos::create([
            'usuarioId' => $usuarioId,
            'fecha' => now(),
            'total' => $carritoItems->sum('total'),
        ]);

        foreach ($carritoItems as $item) {
            DetallePedidos::create([
                'pedidoId' => $pedido->id,
                'materialId' => $item->materialId,
                'cantidad' => $item->cantidad,
                'total' => $item->total,
            ]);

            $material = Materiales::find($item->materialId);
            $material->update([
                'cantidad'=>$material->cantidad-$item->cantidad
            ]);
        }

        Carrito::where('usuarioId', $usuarioId)->delete();

        return $pedido;
    }

    public function actualizarPedido(array $data, $id){
        $pedido = Pedidos::find($id);

        $pedido->update([
            'fecha'=>now(),
        ]);

        return $pedido;
    }

    public function eliminarMaterial($id){
        $pedido = Pedidos::find($id);

        $pedido->delete();
    }
}
