<div>
    {{-- If you look to others for fulfillment, you will never truly be fulfilled. --}}

    <div style="text-align: center">
        <button wire:click="increment" class="btn btn-primary">+</button>
        <h1>{{ $count }}</h1>
        <button wire:click="decrement" class="btn btn-primary">-</button>

    </div>

    @foreach ($products as $product)
        {{$product->name}}
    @endforeach
</div>
