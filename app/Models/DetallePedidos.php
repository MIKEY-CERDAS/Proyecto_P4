<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class DetallePedidos extends Model
{
    protected $fillable = ['pedidoId', 'materialId', 'cantidad', 'total'];

    public function pedidos(): BelongsTo{
        return $this->belongsTo(Pedidos::class, 'pedidoId');
    }

    public function materiales(): BelongsTo{
        return $this->belongsTo(Materiales::class, 'materialId');
    }
}
