<div class="container">

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item" aria-current="page"> Cart</li>
            <li class="breadcrumb-item active" aria-current="page"> Checkout</li>
        </ol>
    </nav>
    <div class="row my-3">
        <div class="col-xl-8">
     
        <form wire:submit="save">
            
            <div class="card card-body mb-3">
                <h5 class="mb-3">Customer Details</h5>
                @include('forms.customer')
            </div>

            <div class="card card-body mb-3">
                <h5 class="mb-3">Shipping Details</h5> 
                @include('forms.address')
            </div>

            <div class="d-flex justify-content-between">
                <a href="" class="text-blue">Continue Shopping</a>
                <button class="btn btn-danger" type="submit">Proceed

                    <div wire:loading>
                        .... <!-- SVG loading spinner -->
                    </div>

                </button>
            </div>
        </form>

        </div>
             <div class="col-xl-4">
            <div class="card">
                <div class="card-body">
                    <h5>Order summary</h5>
                    @livewire('cart.table',['simple'=>true])
                    @livewire('cart.order-summary')
                </div>
            </div>
        </div>
    </div>
    <!-- end row -->
    
</div>