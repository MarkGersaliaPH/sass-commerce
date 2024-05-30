<div class=" px-lg-0"> 
    <div>
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page"> Cart</li>
                </ol>
            </nav>
            <div>
                @livewire('cart.table') 
                <div  class="border-top pt-3">
                    <h5>Order Summary</h5>
                    @livewire('cart.order-summary') 

                </div>
            </div>
            
            <a href="{{ route('checkout') }}" class="btn btn-danger py-2 d-block">Procceed to
                checkout</a>
        </div>
    </div>
    <div>
        @livewire('popular-items')
    </div>
</div>
