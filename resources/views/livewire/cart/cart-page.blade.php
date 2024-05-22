
<div class=" px-lg-0">
    @section('page_title')
    My Cart
    @endsection 
    <div class="pb-5">
        <div class="container">

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page"> Cart</li>
                </ol>
            </nav>
            <div class=""> 
                    @livewire('cart.table')  
                    <div class="card">
                        <div class="card-body">
                            @livewire('cart.order-summary')
                            <a href="{{route('checkout')}}" class="btn btn-danger py-2 d-block">Procceed to
                                checkout</a>
                        </div>
                    </div> 
            </div>

        </div>
    </div>


    <div class="mt-3">

        @livewire('popular-items')
    </div>
</div>
