<div class="mt-3">
    <form wire:submit="save" class="row">

        <div class="col-2">
            <div class="d-flex gap-2 align-items-center">
                <a href="#" class="text-danger cursor-pointer d-block"
                    wire:click="decrease">
                    <i class="fa fa-minus cursor-pointer"></i>
                </a>
                <div class="">
                    <input type="text" value="{{ $qty }}" disabled class="form-control">
                   
                </div>
                <a href="#" class="text-danger cursor-pointer d-block"
                    wire:click="increase">
                    <i class="fa fa-plus"></i>
                </a>
            </div>
        </div>
       
        <div class="col-4">
            <button class="btn btn-danger w-100 " type="submit">ADD TO
                CART</button>

        </div>

    </form>
</div>
