<x-filament-panels::page>
    <div class="mb-6">
        <h2 class="text-2xl font-bold">Detalles del pedido #{{ $pedido->id }}</h2>
        <p><strong>Cliente:</strong> {{ $pedido->usuarios->email }}</p>
        <p><strong>Fecha:</strong> {{ $pedido->fecha }}</p>
        <p><strong>Total:</strong> ₡{{ $pedido->total }}</p>
    </div>
    {{ $this->table }}
    <div class="mt-6">
        <x-filament::button tag="a" href="{{ route('filament.admin.resources.pedidos.index') }}">Volver a la lista</x-filament::button>
    </div>
</x-filament-panels::page>