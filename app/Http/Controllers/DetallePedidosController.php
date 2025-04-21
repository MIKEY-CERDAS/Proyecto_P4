<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pedidos;
use App\Models\DetallePedidos;
use App\Models\Carrito;

class DetallePedidosController extends Controller
{
    public function guardarDetalles(array $data, Pedidos $pedido){
        $carritoItems = Carrito::where('usuarioId', $usuarioId)->get();

        foreach ($carritoItems as $item) {
            DetallePedidos::create([
                'pedidoId' => $pedido->id,
                'materialId' => $item->materialId,
                'cantidad' => $item->cantidad,
                'total' => $item->total,
            ]);
        }
    }

    public function actualizarDetalle(array $data, $id){
        $pedido = DetallePedidos::find($id);

        $pedido->update([
            'materialId'=>$data['materialId'],
            'cantidad'=>$data['cantidad'],
            'total'=>$data['total'],
        ]);

        return $pedido;
    }

    public function eliminarDetalle($id){
        $detalle = DetallePedidos::find($id);

        $detalle->delete();
    }

    public function verDetalles(Pedidos $pedido)
    {
        $detalles = $pedido->detallePedidos()->with('materiales')->get();

        return $detalles;
    }
}
