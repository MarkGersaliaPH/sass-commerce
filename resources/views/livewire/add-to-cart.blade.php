<div class="mt-3">
    <form wire:submit="save">

        <div class="input-group mb-3 number-spinner">
            <div class="input-group-prepend">
                <button class="btn border" wire:click="decrease" data-dir="dwn" type="button"><i
                        class="fas fa-minus text-dark"></i></button>
            </div>
            <input type="text" class="form-control form-control-sm text-center" value={{ $qty }}>
            <div class="input-group-append">
                <button class="btn border" wire:click="increase" data-dir="up" type="button"><i
                        class="fas fa-plus text-dark"></i></button>
            </div>
        </div>

        <button class="btn btn-danger " type="submit">Add to cart</button>

    </form>
</div>
