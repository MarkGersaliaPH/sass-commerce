<div class="mt-3">
    <form wire:submit="save" class="row">

        <div class="col-4">
            <div class="input-group mb-3">
                <button class="btn btn-sm btn-danger" type="button" wire:click='decrease' id="button-addon1"><i
                        class="fa fa-minus"></i></button>
                <input type="number" wire:model="qty" class="form-control px-3" value="{{ $qty }}" placeholder=""
                    aria-label="Example text with button addon" aria-describedby="button-addon1">
                <button class="btn btn-danger btn-sm" type="button" wire:click='increase' id="button-addon1"><i
                        class="fa fa-plus"></i></button>
            </div>
        </div>
       
        <div class="col-4">
            <button class="btn btn-danger w-100 " type="submit">ADD TO
                CART</button>

        </div>

    </form>
</div>
