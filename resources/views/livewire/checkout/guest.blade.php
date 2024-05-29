<div class="container">

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item" aria-current="page"> Cart</li>
            <li class="breadcrumb-item active" aria-current="page"> Checkout</li>
        </ol>
    </nav>
    <form wire:submit="save">


        <div class="card card-body">
            <h5 class="mb-3">Shipping Details</h5>
            @include('forms.address')
        </div>

        <div class="card my-3">
            <div class="card-body">
                <h5>Order summary</h5>
                @livewire('cart.table',['simple'=>true])
                @livewire('cart.order-summary')
            </div>
        </div>

        <div class="d-flex justify-content-between">
            <a href="" class="text-blue">Continue Shopping</a>

            @include('components.spinner')
            <button class="btn btn-danger" wire:loading.remove type="submit">Proceed

            </button>
        </div>
    </form>


    <!-- end row -->

</div>
