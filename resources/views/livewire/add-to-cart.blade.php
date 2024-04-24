<div class="mt-3">
    <form wire:submit="save" class="row">

        <div class="col-md-2">
            <div class="d-flex gap-2 align-items-center">
                <span class="text-danger cursor-pointer d-block"
                    wire:click="decrease">
                    <i class="fa fa-minus cursor-pointer"></i>
                </span>
                <div class="">
                    {{ $qty }}
                </div>
                <span class="text-danger cursor-pointer d-block"
                    wire:click="increase">
                    <i class="fa fa-plus"></i>
                </span>
            </div>
        </div>
       
        <div class="col-md-4">
            <button class="btn btn-danger w-100 " type="submit">ADD TO
                CART</button>

        </div>

    </form>
</div>
